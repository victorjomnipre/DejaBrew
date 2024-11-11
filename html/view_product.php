<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view_product.css">
    <title>Document</title>
</head>
<body>
    <section class="coffeeProfile">
        <img class="dejaLogo" src="images/Deja Brew Brand v2.png" alt="Deja Brew Logo">
        <?php
        if ($coffeeDetails) {
            echo "<div class='content'>";
                echo "<div class='prodImage'>";
                    echo "<img class='coffeeImg' src='" . htmlspecialchars($coffeeDetails->images) . "' alt='" . htmlspecialchars($coffeeDetails->name) . "'>";
                echo "</div>";

                echo "<div class='prodDetails'>";
                    echo "<h3 class='coffeeName'>" . htmlspecialchars($coffeeDetails->name) . "</h3>";
                    echo "<p class='aboutCoffee' id='coffeeDescription'>" . htmlspecialchars($coffeeDetails->description) . "</p>";
                    echo "<p class='aboutCoffee'>Sugar Level: " . htmlspecialchars($coffeeDetails->sugar_level) . "</p>";
                    echo "<p class='aboutCoffee'>Roast Level: " . htmlspecialchars($coffeeDetails->roast_level) . "</p>";
                    echo "<p class='aboutCoffee'>Caffeine Content: " . htmlspecialchars($coffeeDetails->caffeine_content) . "</p>";
                    echo "<p class='aboutCoffee'>Ingredients: " . htmlspecialchars($coffeeDetails->ingredients) . "</p>";
                echo "</div>";
            echo "</div>";
        } else {
            echo "<p>No coffee details found.</p>";
        }
        ?>
    </section>
</body>
</html>