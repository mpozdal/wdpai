<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/OrderRepository.php";
require_once __DIR__ . "/../repository/BasketRepository.php";
class OrderController extends AppController
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function orders()
    {
        session_start();
        if (!isset($_SESSION["email"])) {
            return $this->render("login");
        }
        $orders = $this->orderRepository->getOrders($_SESSION["email"]);
        return $this->render('orders', ["orders" => $orders]);
    }
    public function order($id_order)
    {

        $this->render("order", ["id" => $id_order, "orderInfo" => $this->orderRepository->getOrderItems($id_order)]);
        http_response_code(200);
    }

}


