<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gallery.css">
    <title>Document</title>
</head>
<body>
    <section class="product_profile">
        <image class="dejaLogo" src="images/Deja Brew Brand v2.png"></image>

        <h1 class="section_title">Our Coffee Gallery</h1>
        <ul id="filterBTNS">
            <li onclick="showAllProducts()">All</li>
            <li onclick="filterCoffee('Coffee')">Coffee</li>
            <li onclick="filterCoffee('Non-Coffee')">Non-Coffee</li>
            <li onclick="filterCoffee('Fruit Infusions And Smoothies')">Fruit Infusions And Smoothies</li>
            <li onclick="filterCoffee('Pastry')">Pastry</li>
        </ul>
        <div class="coffee_display" id="coffeeDisplay">
            <?php
                foreach($coffeeImages as $Images)
                {
                    echo "<div class='coffee_card' data-category='" . htmlspecialchars($Images->category) . "'>";
                        echo "<img src='".htmlspecialchars($Images->images)."' alt='" . htmlspecialchars($Images->name) . "'>";
                        echo "<div class='Cofname card_footer'>";
                            echo "<a href='index.php?command=viewProduct&&coffee_id=" . htmlspecialchars($Images->coffee_id) . "'>";
                            echo htmlspecialchars($Images->name);
                            echo "</a>";
                        echo"</div>";
                    echo"</div>";
                }
            ?>
        </div>
    </section>
    <script src="javascript/main.js"></script>
</body>
</html>