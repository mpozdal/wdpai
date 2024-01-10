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
Router::get("admin", 'AdminController');

Router::get("confirm", 'AdminController');
Router::get("cancel", 'AdminController');

Router::post("logout", 'AccountController');
Router::get("orders", 'OrderController');
Router::get("order", 'OrderController');
Router::get("topup", 'AccountController');

Router::get('plusQty', 'BasketController');
Router::get('minusQty', 'BasketController');
Router::get('deleteItem', 'BasketController');
Router::get('add', 'BasketController');
Router::get('create', 'OrderController');

Router::run($path);
?>