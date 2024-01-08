<?php

require_once "AppController.php";

require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/CoffeeRepository.php";

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
    public function aboutus()
    {
        $this->render('aboutus');
    }
    public function cart()
    {
        session_start();
        if ($this->isPost()) {
            if (!isset($_SESSION["email"])) {
                return $this->render('login');
            }
            return $this->render('cart');

        }
        $this->render("cart");
    }
}