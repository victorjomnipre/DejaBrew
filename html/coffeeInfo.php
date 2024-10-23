<?php
include('database.php');
if (isset($_POST['coffee_id'])) {
    $coffee_id = $_POST['coffee_id'];
    $sql = "SELECT * FROM coffees WHERE coffee_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $coffee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo "<div class='content'>";
        echo "<div class='prodImage'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['coffee_picture']) . "' alt='" . $row['name'] . "'>";
        echo "</div>";

        echo "<div class='prodDetails'>";
        echo "<h3 class='coffeeName'>" . $row['name'] . "</h3>";
        echo "<p class='aboutCoffee' id='coffeeDescription'>" . $row['description'] . "</p>";
        echo "<p class='aboutCoffee'>Sugar Level: " . $row['sugar_level'] . "</p>";
        echo "<p class='aboutCoffee'>Roast Level: " . $row['roast_level'] . "</p>";
        echo "<p class='aboutCoffee'>Caffeine Content: " . $row['caffeine_content'] . "</p>";
        echo "<p class='aboutCoffee'>Ingredients: " . $row['ingredients'] . "</p>";
        echo "</div>";
        echo "</div>";

    } else {
        echo "Product not found.";
    }
}
?>