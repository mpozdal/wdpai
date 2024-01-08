<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=8">
    <link rel="stylesheet" href="/public/css/styleCart.css?v=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/cartScript.js?v=8"></script>
    <script src="/public/scripts/menuScript.js?v=8"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="home">

        <div class="menu">
            <div class="menuContent">
                <a href="home"><span>Home</span></a>
                <a href="aboutus"><span>About us</span></a>
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
    </div>




    <main>
        <div class="summaryDiv"></div>

        <div class="mainCart">
            <div class="emptyContainer">
                <img src="./public/assets/emptyCart.png" class="cartImg" />
                Your cart is empty!
            </div>

            <article>
            </article>
        </div>

        <div class="mobileCheckout">

            <form id="cart" method="post" action="cart" class="mobileButton">
                <button type="submit" form="cart" value="cart" class="checkoutButton2">Checkout</button>
            </form>

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
                <!-- <button type="submit" form="cart" value="Order" class="checkoutButton">Checkout</button> -->
                <button onclick="checkout()" class="checkoutButton">Checkout</button>
            </form>



        </div>




    </main>


    </div>
</body>

</html>