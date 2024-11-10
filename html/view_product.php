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
<link rel="stylesheet" href="css/Styles.css">
<link rel="stylesheet" href="css/booklist.css">

<table>
    <thead>
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Coffee Name</td>
            <td><?php echo $bookDetails->name; ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo $bookDetails->description; ?></td>
        </tr>
        <tr>
            <td>Sugar Level</td>
            <td><?php echo $bookDetails->sugar_level; ?></td>
        </tr>
        <tr>
            <td>Roast Level</td>
            <td><?php echo $bookDetails->roast_level; ?></td>
        </tr>
        <tr>
            <td>Caffeine Content</td>
            <td><?php echo $bookDetails->caffeine_content; ?></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><?php echo $bookDetails->category; ?></td>
        </tr>
        <tr>
            <td>Ingredients</td>
            <td><?php echo $bookDetails->ingredients; ?></td>
        </tr>
    </tbody>
</table>
