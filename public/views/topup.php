<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=2">

    <link rel="stylesheet" href="/public/css/styleTopup.css?v=6">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:wght@400;900' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="/public/scripts/topup.js?v=4"></script>
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

                <a href="account"><span>Account</span></a>
                <a href="cart"><span>Cart</span></a>
            </div>
        </div>
    </div>

    <main>



        <form action="topup" class="form" name="payment" method="POST">
            <div>
                <h2>Amount</h2>

                <div class="card">
                    <input type="number" class="amount" placeholder="0.00" name="amount" required /> zł
                </div>
            </div>

            <fieldset>
                <legend>Payment Method</legend>

                <div class="form__radios">
                    <div class="form__radio">
                        <label for="card">Credit card</label>
                        <input checked id="card" value="card" name="payment-method" type="radio" />
                    </div>

                    <div class="form__radio">
                        <label for="applepay">Apple pay</label>
                        <input id="applepay" value="apple" name="payment-method" type="radio" />
                    </div>

                    <div class="form__radio">
                        <label for="googlepay">Google pay</label>
                        <input id="googlepay" value="google" name="payment-method" type="radio" />
                    </div>
                </div>
            </fieldset>

            <div class="cardDetails">
                <h2>Card details</h2>
                <div>
                    <div class="text">Person name</div>
                    <input placeholder="Joe Doe" />
                </div>
                <div>
                    <div class="text">Card Number</div>
                    <input placeholder="XXXX XXXX XXXX XXXX" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}"
                        autocomplete="cc-number" maxlength="19" />
                </div>
                <div class="together">
                    <div>
                        <div class="text">Expiry</div>
                        <input name="credit-expires" class="cc-expires" type="tel" pattern="\d*" maxlength="7"
                            placeholder="MM / YY" />
                    </div>
                    <div>
                        <div class="text">CVV</div>
                        <input class="cc-cvc" type="tel" pattern="\d*" maxlength="4" placeholder="CVC" />
                    </div>
                </div>
            </div>

            <div>
                <button class="button button--full" type="submit">Top up</button>
            </div>
        </form>



    </main>


</body>

</html>