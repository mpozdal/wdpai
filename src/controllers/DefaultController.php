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
}