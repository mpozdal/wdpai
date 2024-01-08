<?php
require "Routing.php";

$path = trim($_SERVER['REQUEST_URI'], "/");
$path = parse_url($path, PHP_URL_PATH);

Router::get("", 'ProductsController');
Router::get("home", 'ProductsController');
Router::post("login", 'SecurityController');
Router::post("register", 'SecurityController');
Router::get("aboutus", 'DefaultController');

Router::get("cart", 'DefaultController');
Router::get("account", 'DefaultController');

Router::post("logout", 'AccountController');
Router::get("orders", 'AccountController');

Router::run($path);
?>