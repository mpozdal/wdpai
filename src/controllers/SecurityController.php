<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . "/../repository/UserRepository.php";
class SecurityController extends AppController
{

    public function login()
    {
        session_start();
        if (isset($_SESSION["email"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/account");
        }

        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];



        $user = $userRepository->getUser($email);
        if (!$user || $user->getEmail() != $email || $user->getPassword() != $password) {
            return $this->render("login");
        }
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $user->getName();
        $_SESSION["balance"] = $user->getBalance();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/account");
    }

    public function register()
    {
        session_start();
        if (isset($_SESSION["email"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/account");
        }
        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('register');
        }
        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = $_POST["password"];

        $userRepository->addUser($email, $name, $password);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }


}