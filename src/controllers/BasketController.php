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

    public function plusQty(int $coffeeId)
    {

        $this->basketRepository->updateQtyPlus($coffeeId);
        http_response_code(200);
    }
    public function minusQty(int $coffeeId)
    {
        $this->basketRepository->updateQtyMinus($coffeeId);
        http_response_code(200);
    }
    public function deleteItem(int $id)
    {
        $this->basketRepository->removeBasketItem($id);
        http_response_code(200);
    }

    public function add(string $name)
    {
        $name = str_replace("_", " ", $name);
        $this->basketRepository->addItemToBasket($name);
        http_response_code(200);
    }


}