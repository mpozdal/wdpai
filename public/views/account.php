<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=2">
    <link rel="stylesheet" href="/public/css/styleAcc.css?v=6">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <a href="home"> <img src="/public/assets/logo.png" class="logo" /></a>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div id="nav">

            <a href="home"><span class="menuDesktop menuDesktopOther">Home</span></a>
            <a href="home#products"><span class="menuDesktop menuDesktopOther">Menu</span></a>
            <a href="aboutus"><span class="menuDesktop menuDesktopOther">About us</span></a>
            <a href="login"><span class="menuDesktop menuDesktopOther">Account</span></a>
        </div>
        <span class="cartNav">
            <a href="cart">
                <span class="menuDesktop menuDesktopOther"><i class="fa-solid fa-cart-shopping"></i></span>
            </a>
        </span>

    </header>
    <div class="menu">
        <div class="menuContent">
            <a href="home"><span>Home</span></a>
            <a href="home#products"><span>Order</span></a>
            <a href="aboutus"><span>About us</span></a>
            <a href="account"><span>Account</span></a>
            <a href="cart"><span>Cart</span></a>
        </div>
    </div>
    <main>

        <div class="list">
            <div class="info">
                <?php
                session_start();
                echo " <div>Hi, " . $_SESSION["name"] . "</div>";

                ?>
            </div>



            <form method="POST" action="orders">
                <button type="submit" value="orders" name="orders" class="button">
                    <i class="fa-solid fa-mug-saucer" style="font-size: 30px;"></i>
                    &nbsp;&nbsp;&nbsp;Orders
                </button>
            </form>

            <form method="POST" action="logout">

                <button type="submit" value="Logout" name="logout" class="button">
                    <i class="fa-solid fa-right-from-bracket" style="font-size: 30px;"></i>
                    &nbsp;&nbsp;&nbsp;Logout
                </button>
            </form>

        </div>
    </main>


</body>

</html>

<?php

?>