<?php include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/coffee_product.css">
    <title>Document</title>
</head>
<body>
    <section class="product_profile">
        <image class="dejaLogo" src="images/Deja Brew Brand v2.png"></image>

        <h1 class="section_title">Our Coffee Products</h1>
        <ul id="filterBTNS">
            <li onclick="showAllProducts()">All</li>
            <li onclick="filterCoffee('Coffee')">Coffee</li>
            <li onclick="filterCoffee('Non-Coffee')">Non-Coffee</li>
            <li onclick="filterCoffee('Fruit Infusions And Smoothies')">Fruit Infusions And Smoothies</li>
            <li onclick="filterCoffee('Pastry')">Pastry</li>
        </ul>
        <div class="coffee_display" id="coffeeDisplay">
            <?php
            $sql = "SELECT * FROM coffees";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='coffee_card' data-category='" . $row['category'] . "'>";
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['coffee_picture']) . "' alt='" . $row['name'] . "'>";
                    echo "<div class='card_footer'>" . $row['name'] . "</div>";
                    echo "<div class='hover_overlay'>";
                    echo "<button class='read_more' onclick='coffeeInformation(" . $row['coffee_id'] . ")'>Read More</button>";
                    echo "</div></div>";
                }
            } else {
                echo "No coffee products available.";
            }
            ?>
        </div>
    </section>

    <!-- Pop-up page -->
    <div id="coffeePopUp" class="coffeePopUp">
        <div class="coffee_content">
            <span class="close" onclick="closePopup()">&times;</span>
            <div id="coffeeDetails"></div>
        </div>
    </div>
    <script src="html/main.js"></script>
</body>
</html>