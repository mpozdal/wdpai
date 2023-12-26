<?php

class Coffee
{

    private $name;
    private $desc;
    private $price;
    private $img;
    private $strength;
    private $id;
    private $points;
    public function __construct($name, $desc, $price, $img, $strength, $id, $points)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
        $this->img = $img;
        $this->strength = $strength;
        $this->id = $id;
        $this->points = $points;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getImg()
    {
        return $this->img;
    }


    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getStrength()
    {
        return $this->strength;
    }


    public function setStrength($strength)
    {
        $this->strength = $strength;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }
}