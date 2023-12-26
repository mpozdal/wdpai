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
        if (!$this->isPost()) {
            return $this->render('cart');
        }

        session_start();
        if (!isset($_SESSION["email"])) {
            return $this->render("login");
        }
        $user_email = $_SESSION["email"];
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($user_email);
        $balance = $user->getBalance();
        $balance = $balance - 5;
        echo $balance;

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


