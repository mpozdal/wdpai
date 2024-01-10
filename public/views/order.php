<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Michal Pozdal">
    <link rel="stylesheet" href="/public/css/styleMain.css?v=4">
    <link rel="stylesheet" href="/public/css/styleOrder.css?v=4">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="/public/scripts/script.js"></script>
    <script src="/public/scripts/menuScript.js?v=4"></script>
    <script src="/public/scripts/orders.js?v=4"></script>
    <script src="https://kit.fontawesome.com/5093dc09b3.js" crossorigin="anonymous"></script>
</head>

<body>

    <main>

        <?php
        if (isset($orderInfo)) {
            echo '<article>';
            foreach ($orderInfo as $item) {
                echo
                    '<div class="cartItem" id="' . $item->getIdCoffee() . '">
                        <img src="' . $item->getSrc() . '" width="60">
                        <div>
            
                            <span class="qty">' . $item->getQuantity() . '</span>
                            
                        </div>
                        <span class=" name">' . $item->getName() . '</span>
                        <span class="price">' . $item->getPrice() . ' zł </span>
                        
                    </div>';
            }
            echo '</article>';




        }
        ?>
        <button id="goBack">BACK TO ORDERS</button>
    </main>


</body>

</html>