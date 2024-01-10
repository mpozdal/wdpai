<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/BasketItem.php";

class BasketRepository extends Repository
{
    private $basketCollection = [];
    private $userID;
    private $totalPrice;
    public function getBasket(string $email)
    {
        $userRepository = new UserRepository();
        $this->userID = $userRepository->getUserID($email);
        $stmt = $this->database->connect()->prepare('
        
        SELECT
            basket.total AS total,
            basketitem.qty AS qty,
            basketitem.id_coffee AS id_coffee,
            coffees.name AS name,
            coffees.price AS price,
            coffees.src AS src
        FROM
            basket
        JOIN
            basketitem ON basket.id_basket = basketitem.id_basket
        JOIN
            coffees ON basketitem.id_coffee = coffees.id_coffee
        WHERE
            basket.id_user = :id;
        ');
        $stmt->bindParam(':id', $this->userID, PDO::PARAM_STR);
        $stmt->execute();

        $basket = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if ($basket == false) {
            return null;
        }
        foreach ($basket as $basketItem) {
            $this->totalPrice = $basketItem["total"];
            $item = new BasketItem(
                $basketItem["id_coffee"],
                $basketItem["qty"],
                $basketItem["name"],
                $basketItem["price"],
                $basketItem["src"],
            );
            array_push($this->basketCollection, $item);
        }
        return $this->basketCollection;
    }
    public function checkBasket(string $coffee)
    {
        session_start();
        $this->getBasket($_SESSION["email"]);
        foreach ($this->basketCollection as $item) {
            if ($item->getIdCoffee() == $coffee) {
                return true;
            }
        }
        return false;
    }
    public function clearBasket($basketID)
    {
        try {
            $stmt = $this->database->connect()->prepare("
                DELETE from basketitem WHERE id_basket = :id_basket
            ");
            $stmt->bindParam(':id_basket', $basketID, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";

        }
    }

    public function addItemToBasket(string $name)
    {
        session_start();
        $userRepository = new UserRepository();
        $this->userID = $userRepository->getUserID($_SESSION["email"]);

        $coffeeRepository = new CoffeeRepository();
        $coffeeId = $coffeeRepository->getCoffeeId($name);
        if (!$this->checkBasket($coffeeId)) {
            $userRepository = new UserRepository();
            $basketId = $userRepository->getBasketId($this->userID);

            try {
                $stmt = $this->database->connect()->prepare("
                INSERT INTO basketitem(id_coffee, qty, id_basket) VALUES (:coffee, 1, :basket)");
                $stmt->bindParam(':coffee', $coffeeId, PDO::PARAM_STR);
                $stmt->bindParam(':basket', $basketId, PDO::PARAM_STR);

                $stmt->execute();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";

            }
        } else {
            $this->updateQtyPlus($coffeeId);
        }

    }
    public function updateQtyPlus(int $coffeeId)
    {

        session_start();
        $userRepository = new UserRepository();
        $this->userID = $userRepository->getUserID($_SESSION["email"]);
        $basketID = $userRepository->getBasketId($this->userID);
        try {
            $stmt = $this->database->connect()->prepare('UPDATE basketitem SET qty = qty + 1 WHERE id_coffee = :id_coffee AND id_basket = :id_basket');
            $stmt->bindParam(':id_coffee', $coffeeId, PDO::PARAM_INT);
            $stmt->bindParam(':id_basket', $basketID, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    public function updateQtyMinus(int $coffeeId)
    {
        session_start();
        $userRepository = new UserRepository();
        $this->userID = $userRepository->getUserID($_SESSION["email"]);
        $basketID = $userRepository->getBasketId($this->userID);
        try {
            $stmt = $this->database->connect()->prepare('UPDATE basketitem SET qty = qty - 1 WHERE id_coffee = :id_coffee AND id_basket = :id_basket');
            $stmt->bindParam(':id_coffee', $coffeeId, PDO::PARAM_INT);
            $stmt->bindParam(':id_basket', $basketID, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    public function removeBasketItem(int $coffeeId)
    {
        session_start();
        $userRepository = new UserRepository();
        $this->userID = $userRepository->getUserID($_SESSION["email"]);
        $basketID = $userRepository->getBasketId($this->userID);
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM basketitem WHERE id_coffee = :id_coffee AND id_basket = :id_basket');
            $stmt->bindParam(':id_coffee', $coffeeId, PDO::PARAM_STR);
            $stmt->bindParam(':id_basket', $basketID, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

}