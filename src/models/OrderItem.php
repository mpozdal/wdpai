<?php

class OrderItem
{
    private $id_coffee;
    private $quantity;
    private $name;
    private $price;
    private $src;
    public function __construct($id_coffee, $quantity, $name, $price, $src)
    {
        $this->id_coffee = $id_coffee;
        $this->quantity = $quantity;
        $this->name = $name;
        $this->price = $price;
        $this->src = $src;

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
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getSrc()
    {
        return $this->src;
    }
}