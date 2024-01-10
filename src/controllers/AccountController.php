<?php

require_once "AppController.php";


class AccountController extends AppController
{


    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        exit();
    }
    public function topup()
    {
        session_start();
        $userRespository = new UserRepository();
        if ($this->isPost()) {
            $amount = $_POST["amount"];

            if (isset($amount)) {
                $userRespository->topupBalance($amount, $_SESSION["email"]);
                return $this->render("account");
            }


        }
        return $this->render("topup");
    }
}