<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css">
    <link rel="stylesheet" href="/public/css/styleCart.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/cartScript.js?v=2"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="index.php"> <img src="/public/assets/logo.png" class="logo" /></a>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div id="nav">
            <a href="home"><span class="menu">Home</span></a>
            <a href="home#products"><span class="menu">Menu</span></a>
            <a href="aboutus"><span class="menu">About us</span></a>
            <?php
            session_start();
            if (isset($_SESSION["email"])) {
                echo '<a href="account"><span class="menu">Account</span></a>';
            } else {
                echo '<a href="login"><span class="menu">Account</span></a>';
            }
            ?>
            <a href="cart"><span class="menu"><i class="fa-solid fa-cart-shopping"></i></span></a>
        </div>

    </header>
    <main>
        <span class="textHeader">
            My cart
        </span>
        <article>
        </article>

        <form id="cart" method="post" action="cart">
            <button type="submit" form="cart" value="cart">Order now</button>
        </form>

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