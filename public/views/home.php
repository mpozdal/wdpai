<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=6">
    <link rel="stylesheet" href="/public/css/styleHome.css?v=12">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet'>
    <script src="/public/scripts/script.js?v=6"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
</head>

<body>


    <div id="home">
        <div id="modal">
            <div class="modal-content">
                <i class="fa-regular fa-circle-check"></i>
                Added!
            </div>
        </div>
        <span class="goUp"><a href="#"><i class="fa-regular fa-circle-up"></i></a></span>

        <div class="menu">
            <div class="menuContent">
                <a href="home"><span>Home</span></a>

                <a href="account"><span>Account</span></a>
                <a href="cart"><span>Cart</span></a>
            </div>
        </div>

        <main>
            <header>
                <a href=" home"> <img src="/public/assets/logo.png" class="logo" /></a>
                <div class="bars">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div id="nav">

                    <a href="home"><span class="menuDesktop">Home</span></a>
                    <a href="home#products"><span class="menuDesktop">Menu</span></a>

                    <a href="login"><span class="menuDesktop">Account</span></a>
                </div>
                <span class="cartNav">
                    <a href="cart">
                        <span class="menuDesktop"><i class="fa-solid fa-cart-shopping"></i></span>
                    </a>
                </span>

            </header>
            <section class="text">
                <span class="mainText">
                    <strong>Make</strong> your day <strong>great</strong><br />with our <strong>coffee!</strong>
                </span>
                <span>
                    <a href="#products">
                        <div class="order">
                            Order now
                        </div>
                    </a>
                </span>


            </section>

            <section class="imgSection">
                <img src="/public/assets/main.png" class="img" />
            </section>
        </main>
    </div>
    <article id="products">
        <section id="headerProducts">
            <span>
                Products
            </span>


        </section>
        <section id="mainProducts">
            <?php foreach ($coffees as $coffee): ?>

                <button class="menuButton">

                    <div class="product">
                        <div class="imgContainer">
                            <img src='<?= $coffee->getImg(); ?>' class="itemImg" />
                        </div>
                        <div class="desc">
                            <span class="itemName">
                                <?= $coffee->getName(); ?>
                            </span>
                            <span class="itemDesc">
                                <?= $coffee->getDesc(); ?>
                            </span>
                        </div>
                        <div class="details">
                            <div class="strength">
                                <?php for ($i = 0; $i < $coffee->getStrength(); $i++): ?>
                                    <i class="fa-solid fa-coffee-bean"></i>
                                <?php endfor; ?>
                                <?php for ($i = 0; $i < 5 - $coffee->getStrength(); $i++): ?>
                                    <i class="fa-regular fa-coffee-bean"></i>
                                <?php endfor; ?>

                            </div>
                            <div class="itemPrice">
                                <?= $coffee->getPrice(); ?> zł
                            </div>
                        </div>
                    </div>
                </button>
            <?php endforeach; ?>
        </section>
    </article>
    <footer>


        <span id="social">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
        </span>
    </footer>
</body>

</html>