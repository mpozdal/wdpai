<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/Order.php";
class OrderRepository extends Repository
{
    private $ordersCollection = [];
    public function getOrders(string $email)
    {
        $userRepository = new UserRepository();
        $userID = $userRepository->getUserID($email);
        $stmt = $this->database->connect()->prepare('
        SELECT orders.total, orders.comment, orders.order_date, orders.status
        FROM orders
        WHERE orders.id_user = :id;
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
                $order["total"]
            );
            array_push($this->ordersCollection, $item);
        }
        return $this->ordersCollection;
    }
    public function createOrder($email, $order_date, $total, $comment, $status)
    {
        echo "abcd";
        $userRepository = new UserRepository();
        $userID = $userRepository->getUserID($email);
        $stmt = $this->database->connect()->prepare("
        INSERT INTO public.orders(id_order, id_user, order_date, status, comment, total) 
        VALUES(:id_order, :id_user, :order_date, :status. :comment, :total)");
        $stmt->bindParam(':id_order', 10, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $userID, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);

        $stmt->execute();
    }
    public function fn()
    {
        echo "clicked";
    }
}