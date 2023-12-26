<?php

class OrderItem
{
    private $id_coffee;
    private $id_order;
    private $quantity;
    private $comment;

    public function __construct($id_coffee, $id_order, $quantity, $comment)
    {
        $this->id_coffee = $id_coffee;
        $this->id_order = $id_order;
        $this->quantity = $quantity;
        $this->comment = $comment;
    }
}