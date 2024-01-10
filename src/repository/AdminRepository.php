<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/Order.php";
class AdminRepository extends Repository
{
    private $ordersCollection = [];
    public function getOrders()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * from "showAllOrders";
        ');

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
                $order["id_order"],
            );
            array_push($this->ordersCollection, $item);
        }
        return $this->ordersCollection;
    }

    public function cancelOrder(string $order)
    {
        $status = "cancelled";
        try {
            $stmt = $this->database->connect()->prepare('
        UPDATE orders SET status = :status WHERE id_order = :id_order
        ');
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id_order', $order, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function confirmOrder(string $order)
    {
        $status = "confirmed";
        try {
            $stmt = $this->database->connect()->prepare('
        UPDATE orders SET status = :status WHERE id_order = :id_order
        ');
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id_order', $order, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}