<?php

require_once "Repository.php";
require_once __DIR__ . "/../models/User.php";

class UserRepository extends Repository
{


    public function getUserID(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return $user["id_user"];
    }
    public function getUserRole(string $email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE email = :email
    ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return $user["acc_type"];
    }
    public function getUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return new User(
            $user['email'],
            $user['name'],
            $user['password'],
            $user['balance'],
            $user['acc_type'],

        );
    }
    public function getUserByID($id_user)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id_user = :id
        ');
        $stmt->bindParam(':id', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        return new User(
            $user['email'],
            $user['name'],
            $user['password'],
            $user['balance'],
            $user['acc_type'],

        );
    }
    public function topupBalance($amount, string $email)
    {

        $stmt = $this->database->connect()->prepare('UPDATE users SET balance = balance + :amount 
        WHERE email = :email');
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare("
        INSERT INTO public.users(email, name, password, balance, acc_type) VALUES(:email, :name, :password, :balance, :acc_type)");
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindParam(':balance', $user->getBalance(), PDO::PARAM_STR);
        $stmt->bindParam(':acc_type', $user->getAccType(), PDO::PARAM_STR);

        $stmt->execute();
        $this->createBasket($user->getEmail());
    }
    public function createBasket(string $email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE email = :email
    ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare("
        INSERT INTO public.basket(id_user) VALUES(:id)");
        $stmt->bindParam(':id', $user["id_user"], PDO::PARAM_STR);

        $stmt->execute();

    }
    public function getBasketId($id_user)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.basket WHERE id_user = :id
    ');
        $stmt->bindParam(':id', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $basketId = $stmt->fetch(PDO::FETCH_ASSOC);
        return $basketId["id_basket"];
    }

}