<?php
require_once "AppController.php";
require_once __DIR__ . '/../models/Coffee.php';
require_once __DIR__ . "/../repository/CoffeeRepository.php";
class ProductsController extends AppController
{
    private $coffeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->coffeRepository = new CoffeeRepository();
    }

    public function home()
    {
        $coffees = $this->coffeRepository->getCoffees();

        $this->render('home', ["coffees" => $coffees]);
    }


}