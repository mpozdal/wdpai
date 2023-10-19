<?php

class User
{
    private $email;
    private $name;
    private $password;
    private $balance;

    public function __construct(string $email, string $name, string $password, $balance)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->balance = $balance;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setBalance($balance)
    {
        $this->balance = $balance;

    }
    public function getBalance()
    {
        return $this->balance;
    }
    public function setName(string $name)
    {
        $this->name = $name;

    }
    public function getName()
    {
        return $this->name;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;

    }
    public function getPassword()
    {
        return $this->password;
    }
}