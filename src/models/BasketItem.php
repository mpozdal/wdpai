<?php

class BasketItem
{
    private $id_coffee;
    private $quantity;
    public function __construct($id_coffee, $quantity)
    {
        $this->id_coffee = $id_coffee;
        $this->quantity = $quantity;

    }

    public function setIdCoffee(string $id)
    {
        $this->id_coffee = $id;
    }
    public function getIdCoffee()
    {
        return $this->id_coffee;
    }

    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
}