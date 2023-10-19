<?php

require_once "AppController.php";

class DefaultController extends AppController
{
    public function home()
    {
        $this->render('home');
    }

    public function account()
    {
        session_start();
        if (!isset($_SESSION["email"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $this->render('account');
    }
    public function cart()
    {
        $this->render('cart');
    }
    public function aboutus()
    {
        $this->render('aboutus');
    }
}