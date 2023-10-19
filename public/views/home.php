<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=3">
    <link rel="stylesheet" href="/public/css/styleHome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet'>
    <script src="/public/scripts/script.js?v=2"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="home">
        <header>
            <a href="home"> <img src="/public/assets/logo.png" class="logo" /></a>
            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div id="nav">
                <a href="home"><span class="menu">Home</span></a>
                <a href="home#products"><span class="menu">Menu</span></a>
                <a href="aboutus"><span class="menu">About us</span></a>
                <a href="login"><span class="menu">Account</span></a>;

            </div>
            <a href="cart"><span class="menu"><i class="fa-solid fa-cart-shopping"></i></span></a>

        </header>

        <main>

            <section class="text">

                <span class="mainText">
                    <strong>Make</strong> your day <strong>great</strong><br />with our <strong>coffee!</strong>
                </span>
                <a href="#products">
                    <div class="order">
                        Order now
                    </div>
                </a>


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


        </section>
    </article>
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