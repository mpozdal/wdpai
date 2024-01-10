<?php

class Order
{
    private $id_user;
    private $id_order;
    private $order_date;
    private $status;
    private $total;

    public function __construct($id_user, $order_date, $status, $total, $id_order)
    {
        $this->id_user = $id_user;
        $this->order_date = $order_date;
        $this->status = $status;
        $this->total = $total;
        $this->id_order = $id_order;
    }
    public function getUser()
    {
        return $this->id_user;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getOrderId()
    {
        return $this->id_order;
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