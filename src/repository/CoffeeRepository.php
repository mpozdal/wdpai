<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/Coffee.php";

class CoffeeRepository extends Repository
{
    private $coffeesCollection = [];
    public function getCoffees()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.coffees
        ');

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results == false) {
            return null;
        }
        foreach ($results as $coffee) {
            $coffeeItem = new Coffee(
                $coffee["name"],
                $coffee["desc"],
                $coffee["price"],
                $coffee["src"],
                $coffee["strength"],
                $coffee["id_coffee"],
                $coffee["points"],
            );
            array_push($this->coffeesCollection, $coffeeItem);
        }
        return $this->coffeesCollection;
    }

    public function getCoffee($id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.coffees WHERE id_coffee = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $coffee = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($coffee == false) {
            return null;
        }

        return new Coffee(
            $coffee["itemName"],
            $coffee["itemDesc"],
            $coffee["itemPrice"],
            $coffee["imgSrc"],
            $coffee["strength"],
            $coffee["id_coffee"],
            $coffee["points"],

        );
    }


}