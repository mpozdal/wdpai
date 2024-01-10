<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/Order.php";
require_once __DIR__ . "/../models/OrderItem.php";
class OrderRepository extends Repository
{
    private $ordersCollection = [];

    public function getOrderItems($id_order)
    {
        $orderCollection = [];
        $stmt = $this->database->connect()->prepare('
        SELECT
        orderitem.id_coffee AS id_coffee,
        orderitem.qty AS qty,
        coffees.name AS name,
        coffees.price AS price,
        coffees.src AS src
    FROM
        orderitem
    JOIN
        coffees ON orderitem.id_coffee = coffees.id_coffee
    WHERE
        orderitem.id_order = :id;
        ');
        $stmt->bindParam(':id', $id_order, PDO::PARAM_STR);
        $stmt->execute();

        $order = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($order as $orderItem) {

            $item = new OrderItem(
                $orderItem["id_coffee"],
                $orderItem["qty"],
                $orderItem["name"],
                $orderItem["price"],
                $orderItem["src"],
            );
            array_push($orderCollection, $item);
        }
        return $orderCollection;
    }
    public function getOrders(string $email)
    {
        $userRepository = new UserRepository();
        $userID = $userRepository->getUserID($email);
        $stmt = $this->database->connect()->prepare('
        SELECT orders.id_order, orders.total, orders.comment, orders.order_date, orders.status
        FROM orders
        WHERE orders.id_user = :id
        ORDER BY orders.order_date DESC;
        ');
        $stmt->bindParam(':id', $userID, PDO::PARAM_STR);
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($orders == false) {
            return null;
        }
        foreach ($orders as $order) {
            $item = new Order(
                $order["id_user"],
                $order["order_date"],
                $order["status"],
                $order["total"],
                $order["id_order"]
            );
            array_push($this->ordersCollection, $item);
        }
        return $this->ordersCollection;
    }

    public function createOrder(string $orderID, string $email, string $comment, float $total, $basket, $status)
    {
        $conn = $this->database->connect();
        $conn->beginTransaction();
        try {
            $userRepository = new UserRepository();
            $userID = $userRepository->getUserID($email);
            $basketID = $userRepository->getBasketId($userID);
            $stmt = $conn->prepare("
            UPDATE users SET balance = balance - :total WHERE email = :email");
            $stmt->bindParam(':total', $total, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $stmt = $conn->prepare("
            INSERT INTO orders(id_order, id_user, status, comment, total) 
            VALUES(:id_order, :id_user, :status, :comment, :total)");
            $stmt->bindParam(':id_order', $orderID, PDO::PARAM_STR);
            $stmt->bindParam(':id_user', $userID, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':total', $total, PDO::PARAM_STR);
            $stmt->execute();

            foreach ($basket as $item) {
                $stmt = $conn->prepare("
            INSERT INTO public.orderitem(id_order, id_coffee, qty) 
            VALUES(:id_order, :id_coffee, :qty)");
                $stmt->bindParam(':id_order', $orderID, PDO::PARAM_STR);
                $stmt->bindParam(':id_coffee', $item->getIdCoffee(), PDO::PARAM_STR);
                $stmt->bindParam(':qty', $item->getQuantity(), PDO::PARAM_STR);
                $stmt->execute();
            }
            $basketRepository = new BasketRepository();
            $basketRepository->clearBasket($basketID);

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            echo $e;
        }


    }

}