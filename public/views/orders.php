<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=4">
    <link rel="stylesheet" href="/public/css/styleOrders.css?v=5">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="/public/scripts/orders.js?v=4"></script>
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


    </div>
    <main>

        <table id="orders">
            <tr class="tableHeader">
                <th>ID</th>
                <th>Data</th>
                <th>Status</th>
                <th>Total</th>
                <th></th>
            </tr>
            <?php if (isset($orders))
                foreach ($orders as $order): ?>
                    <tr class="order" id="<?= $order->getOrderId(); ?>">
                        <td class="id">
                            <?= $order->getOrderId(); ?>
                        </td>
                        <td>
                            <?= date('Y-m-d H:i:s', strtotime($order->getOrderDate())); ?>
                        </td>
                        <td class="status">
                            <?= $order->getStatus(); ?>
                        </td>
                        <td>
                            <?= $order->getTotal(); ?>
                        </td>
                        <td>
                            <button class="info"><i class="fa-solid fa-circle-info" style="font-size: 10px;"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>

    </main>


</body>

</html>