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

        );
    }


    public function addUser(string $email, string $name, string $password)
    {
        $stmt = $this->database->connect()->prepare("
        INSERT INTO public.users(email, name, password) VALUES(:email, :name, :password)");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
        $this->createBasket($email);
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

}