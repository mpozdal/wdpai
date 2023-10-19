<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=4">
    <link rel="stylesheet" href="/public/css/styleCart.css?v=4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/cartScript.js?v=4"></script>
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
        <div class="summaryDiv">

        </div>
        <div class="mainCart">
            <span class="textHeader">
                My cart
            </span>
            <article>
            </article>
        </div>
        <div class="summaryDiv">
            <div class="summary">
                <span class="summaryHeader">
                    SUMMARY ORDER
                </span>
                <span class="totalContainer">
                    <span class="total">
                        TOTAL
                    </span>
                    <span class="totalPrice">

                    </span>
                </span>
            </div>
            <form id="cart" method="post" action="cart">
                <button type="submit" form="cart" value="cart">Order now</button>
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