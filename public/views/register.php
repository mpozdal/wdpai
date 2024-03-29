<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css">
    <link rel="stylesheet" href="/public/css/styleLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="home">

        <div class="menu">
            <div class="menuContent">
                <a href="home"><span>Home</span></a>

                <a href="account"><span>Account</span></a>
                <a href="cart"><span>Cart</span></a>
            </div>
        </div>
        <header>
            <a href=" home"> <img src="/public/assets/logo.png" class="logo" /></a>
            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div id="nav">

                <a href="home"><span class="menuDesktop menuDesktopOther">Home</span></a>
                <a href="home#products"><span class="menuDesktop menuDesktopOther">Menu</span></a>

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
    </div>

    <main>
        <span class="textHeader">
            Register
        </span>
        <form id="register" method="post" action="register">
            <span><i class="fa-solid fa-envelope"></i><input type="email" id="email" name="email"
                    placeholder="Email"></span>
            <span><i class="fa-solid fa-user"></i><input type="name" id="name" name="name" placeholder="Name"></span>
            <span><i class="fa-solid fa-key"></i><input type="password" id="password" name="password"
                    placeholder="Password"></span>
            <span><i class="fa-solid fa-key"></i><input type="password" id="password2" name="password2"
                    placeholder="Re-entry password"></span>
            <a href="login"><span class="noAcc">Already a user?</span></a>

        </form>
        <button type="submit" form="register" value="Register">Register</button>

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
    </div>
</body>

</html>