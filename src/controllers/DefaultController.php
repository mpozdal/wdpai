<?php

require_once "AppController.php";

require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/CoffeeRepository.php";
require_once __DIR__ . "/../repository/BasketRepository.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/OrderRepository.php";
require_once __DIR__ . "/../repository/AdminRepository.php";

class DefaultController extends AppController
{


    public function account()
    {
        session_start();
        if (!isset($_SESSION["email"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $this->render('account');
    }
    public function admin()
    {
        $user = new UserRepository();
        if (isset($_SESSION["email"])) {
            if ($user->getUserRole($_SESSION["email"]) !== "admin") {
                return $this->render('account');
            }
        }
        $orders = new AdminRepository();
        return $this->render('admin', ["orders" => $orders->getOrders()]);
    }
    public function aboutus()
    {
        $this->render('aboutus');
    }

    public function cart()
    {
        session_start();
        $basketRepository = new BasketRepository();
        if (!isset($_SESSION["email"])) {
            return $this->render('login');
        }
        if ($this->isPost()) {
            if (!isset($_SESSION["email"])) {
                return $this->render('login');
            }
            $orderID = substr(str_shuffle(str_repeat("0123456789QWERTYUIOPASDFGHJKLZXCVBNMH", 6)), 0, 6);
            $basket = $basketRepository->getBasket($_SESSION["email"]);
            $orderRepository = new OrderRepository();
            $userRepository = new UserRepository();
            $comment = 0;
            $status = "paid";
            $total = $_POST["total"];
            if ($userRepository->getUser($_SESSION["email"])->getBalance() >= $total) {

                $orderRepository->createOrder($orderID, $_SESSION["email"], $comment, $total, $basket, $status);
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/order/{$orderID}");
                exit();
            } else {
                return $this->render("cart", ["items" => $basket, "error" => "Doladuj konto!"]);
            }


        }


        return $this->render("cart", ["items" => $basketRepository->getBasket($_SESSION["email"])]);
    }
}