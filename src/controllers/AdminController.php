<?php

require_once "AppController.php";

require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/CoffeeRepository.php";
require_once __DIR__ . "/../repository/BasketRepository.php";
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/OrderRepository.php";
require_once __DIR__ . "/../repository/AdminRepository.php";

class AdminController extends AppController
{

    private $adminRepository;

    public function __construct()
    {
        parent::__construct();
        $this->adminRepository = new AdminRepository();
    }
    public function admin()
    {
        $user = new UserRepository();
        if (isset($_SESSION["email"])) {
            if ($user->getUserRole($_SESSION["email"]) !== "admin") {
                return $this->render('account');
            }
        }

        return $this->render('admin', ["orders" => $this->adminRepository->getOrders()]);
    }
    public function cancel(string $id)
    {

        $this->adminRepository->cancelOrder($id);
        http_response_code(200);

    }
    public function confirm(string $id)
    {
        $this->adminRepository->confirmOrder($id);
        http_response_code(200);
    }
}