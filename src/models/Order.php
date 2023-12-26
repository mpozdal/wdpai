<?php

class Order
{
    private $id_user;
    private $order_date;
    private $status;
    private $total;

    public function __construct($id_user, $order_date, $status, $total)
    {
        $this->id_user = $id_user;
        $this->order_date = $order_date;
        $this->status = $status;
        $this->total = $total;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getOrderDate()
    {
        return $this->order_date;
    }

}