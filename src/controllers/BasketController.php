<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/BasketRepository.php";
class BasketController extends AppController
{
    private $basketRepository;

    public function __construct()
    {
        parent::__construct();
        $this->basketRepository = new BasketRepository();
    }

    public function cart()
    {
        session_start();
        $user_email = $_SESSION["email"];
        $coffees = $this->basketRepository->getBasket($user_email);

        $this->render('cart');
    }


}