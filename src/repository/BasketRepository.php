<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/BasketItem.php";

class BasketRepository extends Repository
{
    private $basketCollection = [];
    private $totalPrice;
    public function getBasket(string $email)
    {
        $userRepository = new UserRepository();
        $userID = $userRepository->getUserID($email);
        $stmt = $this->database->connect()->prepare('
        SELECT basket.total, "basketItem".id_coffee, "basketItem".quantity
        FROM basket
        JOIN "basketItem" ON basket.id_basket = "basketItem".id_basket  
        WHERE basket.id_user = :id;
        ');
        $stmt->bindParam(':id', $userID, PDO::PARAM_STR);
        $stmt->execute();

        $basket = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($basket == false) {
            return null;
        }
        foreach ($basket as $basketItem) {
            $this->totalPrice = $basketItem["total"];
            $item = new BasketItem(
                $basketItem["id_coffee"],
                $basketItem["quantity"],
            );
            array_push($this->basketCollection, $item);
        }
        return $this->basketCollection;
    }

}