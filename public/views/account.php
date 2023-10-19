<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=2">
    <link rel="stylesheet" href="/public/css/styleAcc.css?v=4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <a href="home"> <img src="/public/assets/logo.png" class="logo" /></a>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div id="nav">
            <a href="home"><span class="menu">Home</span></a>
            <a href="home#products"><span class="menu">Menu</span></a>
            <a href="aboutus"><span class="menu">About us</span></a>
            <a href="login"><span class="menu">Account</span></a>

        </div>
        <a href="cart"><span class="menu"><i class="fa-solid fa-cart-shopping"></i></span></a>

    </header>
    <main>

        <div class="list">
            <div class="info">
                <?php
                session_start();
                echo " <div>Hi, " . $_SESSION["name"] . "</div>";
                echo "<div class='balance'>Your balance: " . $_SESSION["balance"] . " zł</div>";

                ?>
            </div>



            <form method="POST" action="orders">
                <button type="submit" value="orders" name="orders" class="button">
                    <i class="fa-solid fa-mug-saucer" style="font-size: 30px;"></i>
                    &nbsp;&nbsp;&nbsp;Orders
                </button>
            </form>



            <form method="POST" action="topup">
                <button type="submit" value="topup" name="topup" class="button">
                    <i class="fa-solid fa-money-bill" style="font-size: 30px;"></i>
                    &nbsp;&nbsp;&nbsp;Top up
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

    <footer>
        <span id="newsletter">
            <h5>Subscribe to our newsletter!</h5>
            <span>
                <input type="text" id="email" name="email" placeholder="Email">
                <span class="btn">
                    OK
                </span>
            </span>
        </span>


        <span id="social">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
        </span>
    </footer>
</body>

</html>

<?php

?>