<?php

require_once "AppController.php";


class AccountController extends AppController
{

    public function orders()
    {
        echo "orders";
    }
    public function topup()
    {
        if (isset($_SESSION["email"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/topup");
        }
    }
    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        exit();
    }
}