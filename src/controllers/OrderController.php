<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/OrderRepository.php";
class OrderController extends AppController
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function cart()
    {

        if ($this->isPost()) {
            session_start();
            if (!isset($_SESSION["email"])) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/login");
                exit();
            }
            return $this->render('home');


        }

        return $this->render('cart');

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

}


