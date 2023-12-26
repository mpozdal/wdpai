<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/Ordercontroller.php';
require_once 'src/controllers/AccountController.php';
require_once 'src/controllers/ProductsController.php';
require_once 'src/controllers/BasketController.php';

class Router
{

    public static $routes;

    public static function get($url, $view)
    {
        self::$routes[$url] = $view;
    }
    public static function post($url, $view)
    {
        self::$routes[$url] = $view;
    }


    public static function run($url)
    {
        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'home';

        $object->$action();
    }
}