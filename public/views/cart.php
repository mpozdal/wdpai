<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=8">
    <link rel="stylesheet" href="/public/css/styleCart.css?v=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/basket.js"></script>
    <script src="/public/scripts/menuScript.js?v=9"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="loading">
        Creating order..
        <div id="progress">
            <div id="myBar"></div>
        </div>
    </div>
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

                <a href="account"><span>Account</span></a>
                <a href="cart"><span>Cart</span></a>
            </div>
        </div>
    </div>

    <main>

        <div class="summaryDiv"></div>

        <div class="mainCart">
            <?php
            if (isset($items)) {
                echo '<article>';
                foreach ($items as $item) {
                    echo
                        '<div class="cartItem" id="' . $item->getIdCoffee() . '">
                        <img src="' . $item->getSrc() . '" width="60" alt="Produkt 1">
                        <div>
                            <span class="edit minus">- </span>
                            <span class="qty">' . $item->getQuantity() . '</span>
                            <span class="edit plus"> +</span>
                        </div>
                        <span class=" name">' . $item->getName() . '</span>
                        <span class="price">' . $item->getPrice() . ' zł </span>
                        <i class="fa-solid fa-xmark delete"></i>
                    </div>';
                }
                echo '</article>';




            } else {
                echo '
                    <div class="emptyContainer">
                <img src="./public/assets/emptyCart.png" class="cartImg" />
                Your cart is empty!
            </div>
                    ';
            }
            ?>



        </div>

        <div class="mobileCheckout">
            <?= $error ?>
            <span class="totalContainer">
                <span class="total">
                    TOTAL
                </span>
                <span class="totalPrice2">
                    0.00 zł
                </span>
            </span>

            <form action="cart" method="post">
                <input type="hidden" name="total2" class="hiddenTotal2">
                <button type="submit" class="checkoutButton">Checkout</button>
            </form>

        </div>
        <div class="summaryDiv">
            <?= $error ?>
            <div class="summary">
                <span class="summaryHeader">
                    SUMMARY ORDER
                </span>
                <span class="totalContainer">
                    <span class="total">
                        TOTAL

                    </span>
                    <span class="totalPrice">
                        0.00 zł
                    </span>
                </span>
            </div>

            <form action="cart" method="post">
                <input type="hidden" name="total" class="hiddenTotal">
                <button type="submit" class="checkoutButton">Checkout</button>
            </form>
        </div>




    </main>


    </div>
</body>

</html>