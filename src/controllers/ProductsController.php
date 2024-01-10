<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/CoffeeRepository.php";
require_once __DIR__ . "/../repository/BasketRepository.php";
class ProductsController extends AppController
{
    private $coffeRepository;
    private $basketRepository;

    public function __construct()
    {
        parent::__construct();
        $this->coffeRepository = new CoffeeRepository();
        $this->basketRepository = new BasketRepository();
    }

    public function home()
    {
        if ($this->isPost()) {
            $coffee = $_POST["coffeeType"];

            session_start();
            if (!isset($_SESSION["email"])) {
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/login");
                exit();
            }

            $this->basketRepository->addItemToBasket($coffee, $_SESSION["email"]);
        }
        $coffees = $this->coffeRepository->getCoffees();

        $this->render('home', ["coffees" => $coffees]);


    }



}