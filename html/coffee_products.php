<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/coffee_product.css">
    <title>Document</title>
</head>
<body id="top">
    <section class="product_profile" id="product_profile">
        <form id="searchForm" method="POST" action="index.php">
            <input type="hidden" name="command" value="products">
            <input type="text" name="searchInput" id="coffeeName" autocomplete="off" placeholder="Search Product...">
            <button type="submit">Search</button>
        </form>

        <image class="dejaLogo" src="images/Deja Brew Brand v2.png"></image>
        <h1 class="section_title">Our Coffee Products</h1>
        <ul id="filterBTNS">
            <li onclick="showAllProducts()">All</li>
            <li onclick="filterCoffee('Coffee')">Coffee</li>
            <li onclick="filterCoffee('Non-Coffee')">Non-Coffee</li>
            <li onclick="filterCoffee('Fruit Infusions And Smoothies')">Fruit Infusions And Smoothies</li>
            <li onclick="filterCoffee('Pastry')">Pastry</li>
        </ul>
        <div class="coffee_display">
            <?php
            foreach ($books as $profile) {
                echo "<div class='coffee_card' data-category='" . htmlspecialchars($profile->category) . "'>";
                    echo "<img src='" . htmlspecialchars($profile->images) . "' alt='" . htmlspecialchars($profile->name) . "'>";
                    echo "<div class='Cofname card_footer'>";
                        echo "<a href='index.php?command=viewProduct&coffee_id=" . htmlspecialchars($profile->coffee_id) . "'>";
                            echo htmlspecialchars($profile->name);
                        echo "</a>";
                    echo "</div>";
                    echo "<div class='Cofingredients card_footer'>" . htmlspecialchars($profile->ingredients) . "</div>";
                    echo "<div class='buttons'>";
                        echo "<a href='index.php?command=editBooks&coffee_id=" . htmlspecialchars($profile->coffee_id) . "'>Edit</a> | ";
                        echo "<a href='index.php?command=deleteRec&coffee_id=" . htmlspecialchars($profile->coffee_id) . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
                    echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <a href="#top" class="back-to-top">
            <img src="images/toTop.png" alt="Back to Top" class="back-to-top-img">
        </a>
    </section>

    <script src="javascript/main.js"></script>
</body>
</html>