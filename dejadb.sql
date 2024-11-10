-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 07:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffees`
--

CREATE TABLE `coffees` (
  `coffee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sugar_level` varchar(100) DEFAULT NULL,
  `roast_level` varchar(100) DEFAULT NULL,
  `caffeine_content` varchar(50) DEFAULT NULL,
  `category` enum('Coffee','Non-Coffee','Fruit Infusions And Smoothies','Pastry') NOT NULL,
  `ingredients` text DEFAULT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffees`
--

INSERT INTO `coffees` (`coffee_id`, `name`, `description`, `sugar_level`, `roast_level`, `caffeine_content`, `category`, `ingredients`, `images`) VALUES
(1, 'Vanilla Almond Latte', 'A delightful blend of rich espresso and steamed milk, infused with sweet vanilla syrup and a hint of almond, creating a smooth and comforting drink perfect for any time of day.', 'Medium', 'Medium', 'High', 'Coffee', 'Espresso, Steamed milk, Vanilla syrup, Almond extract.', 'uploads/Vanilla Almond Latte.jpg'),
(2, 'Caramel Swirl Cappuccino', 'This classic cappuccino is elevated with luscious caramel syrup, creating a sweet and creamy experience. Topped with a drizzle of caramel, it’s a perfect treat for those who love a hint of sweetness in their coffee.', ' Medium', ' Medium', 'High', 'Coffee', 'Espresso, Steamed Milk, Caramel Syrup, Caramel Drizzle.', 'uploads/Caramel Swirl Cappuccino.jpg'),
(3, 'Chocolate Hazelnut Mocha', 'Indulge in this decadent mocha that combines bold espresso with creamy steamed milk, rich chocolate syrup, and a touch of hazelnut syrup. Topped with whipped cream, this drink is a dessert in a cup, perfect for chocolate lovers.', 'High', 'Medium', 'High', 'Coffee', 'Espresso, Steamed Milk, Chocolate Syrup, Hazelnut Syrup, Whipped Cream.', 'uploads/Chocolate Hazelnut Mocha.jpg'),
(4, 'Spanish Latte', 'This unique coffee drink features a blend of espresso and steamed milk, sweetened with condensed milk for a creamy and caramelized flavor. It’s a delightful choice that offers a taste of traditional Spanish coffee culture.', 'High', 'Medium', 'High', 'Coffee', 'Espresso, Steamed Milk, Sweetened Condensed Milk.', 'uploads/Spanish Latte.jpg'),
(5, 'Espresso', 'A strong and concentrated coffee made from finely ground coffee beans brewed under pressure. This classic drink packs a powerful punch of flavor and caffeine, making it an excellent choice for a quick pick-me-up.', ' None', 'Dark', 'High', 'Coffee', 'Finely Ground Coffee Beans, Hot Water.', 'uploads/Espresso.jpg'),
(6, 'Americano', 'Made by diluting rich espresso with hot water, the Americano retains the bold coffee flavor while providing a smoother and lighter taste. It’s an ideal choice for those who enjoy the essence of coffee without the intensity.', 'None', ' Medium', 'High', 'Coffee', ' Espresso, Hot Water.', 'uploads/Americano.jpg'),
(7, 'Latte', 'This classic coffee drink features a combination of bold espresso and creamy steamed milk, finished with a small amount of milk foam on top. It’s a smooth and mild option, perfect for those who enjoy a milky coffee experience.', ' Low', 'Medium', 'Medium', '', 'Espresso, Steamed Milk, Milk Foam.', 'uploads/Latte.jpg'),
(8, 'Cappuccino', 'A perfect balance of equal parts espresso, steamed milk, and foam, this cappuccino is a rich and frothy delight. Its creamy texture and strong coffee flavor make it a popular choice among coffee enthusiasts.', 'Low', 'Medium', 'High', 'Coffee', 'Espresso, Steamed Milk, Milk Foam.', 'uploads/Cappuccino.jpg'),
(9, 'Classic Hot Chocolate', 'A rich and velvety hot chocolate made with premium cocoa powder and steamed milk, topped with a generous dollop of whipped cream. This comforting beverage is perfect for cozy days and is sure to satisfy any chocolate craving.', ' High', 'None', 'None', 'Non-Coffee', 'Cocoa Powder, Steamed Milk, Sugar, Whipped Cream.', 'uploads/Hot Chocolate.jpg'),
(10, 'Peppermint Hot Chocolate', 'Experience the festive flavors of this hot chocolate enhanced with refreshing peppermint syrup. Topped with whipped cream, it’s a deliciously comforting drink that brings the spirit of the season to your cup.', 'High', 'None', 'None', 'Non-Coffee', 'Cocoa Powder, Steamed Milk, Peppermint Syrup, Whipped Cream.', 'uploads/Peppermint Hot Chocolate.jpg'),
(11, 'Traditional Matcha Latte', 'Enjoy matcha green tea\'s earthy and vibrant flavor, blended with steamed milk for a creamy texture. This healthful drink is not only delicious but also packed with antioxidants, making it a perfect choice for a wellness boost.', 'Medium', 'None', 'LOW', 'Non-Coffee', 'Matcha powder, Steamed Milk, Sugar.', 'uploads/Traditional Matcha.jpg'),
(12, 'Iced Matcha Latte', 'A refreshing cold beverage made with matcha green tea, chilled milk, and ice. This drink offers a smooth, creamy texture and a vibrant green color, making it a visually appealing and energizing option for warm days.', 'Medium', 'None', ' LOW', 'Non-Coffee', 'Matcha Powder, Cold Milk, Ice, Sugar.', 'uploads/Iced Matcha.jpg'),
(13, 'Chamomile Tea', 'Soothe your senses with this calming herbal tea made from dried chamomile flowers steeped in hot water. Known for its relaxing properties, this tea is perfect for unwinding at the end of a long day.', ' None', ' None', 'None', 'Non-Coffee', 'Chamomile Flowers, Hot Water.', 'uploads/Chamomile Tea.jpg'),
(14, 'Peppermint Tea', 'Refreshing and invigorating, this tea is made from minty peppermint leaves steeped in hot water. It’s perfect for a pick-me-up or a soothing end to your day, leaving you feeling revitalized.', 'None', 'None', 'None', 'Non-Coffee', 'Peppermint Leaves, Hot Water.', 'uploads/Peppermint Tea.jpg'),
(15, 'Rooibos Tea', 'A caffeine-free herbal tea with a naturally sweet and rich flavor. Made from the leaves of the rooibos plant, this tea is great served hot or iced, and is often enjoyed with a splash of milk or a slice of lemon.', 'None', 'None', 'None', 'Non-Coffee', 'Rooibos Leaves, Hot Water.', 'uploads/Rooibos Tea.jpg'),
(16, 'Hibiscus Tea', 'A vibrant red herbal tea with a tart and fruity flavor, made from dried hibiscus petals. This refreshing beverage can be enjoyed hot or cold and is often sweetened to balance its natural tartness.', 'Low', 'None', 'None', 'Non-Coffee', 'Hibiscus Petals, Hot Water, Sugar (optional).', 'uploads/Hibiscus Tea.jpg'),
(17, 'Berry Lemonade', 'A refreshing twist on classic lemonade, this drink is infused with a medley of vibrant berries, adding a delightful sweetness and tartness. Perfect for a hot day, it\'s both hydrating and flavorful.', 'Medium', 'None', 'None', 'Fruit Infusions And Smoothies', 'Lemon Juice, Water, Sugar, Mixed Berries (Strawberries, Blueberries, Raspberries).', 'uploads/Berry Lemonade.jpg'),
(18, 'Cucumber Mint Water', 'A revitalizing drink that combines cool cucumber slices and fresh mint leaves steeped in water. This refreshing infusion is perfect for staying hydrated while enjoying a subtle, crisp flavor.', 'None', 'None', 'None', 'Fruit Infusions And Smoothies', 'Water, Cucumber Slices, Mint Leaves.', 'uploads/Cucumber Mint Water.jpg'),
(19, 'Apple Cinnamon Water', 'A comforting infusion of crisp apple slices and fragrant cinnamon sticks in water, this drink is subtly sweet and perfect for fall or any time you crave a warm, spiced beverage.', 'Low', 'None', 'None', 'Fruit Infusions And Smoothies', 'Water, Apple Slices, Cinnamon Sticks.', 'uploads/Apple Cinnamon Water.jpg'),
(20, 'Berry Blast Smoothie', 'This delicious smoothie is packed with a blend of mixed berries, creamy yogurt, and a drizzle of honey for sweetness. It\'s a nutritious and refreshing option for breakfast or a snack.', 'High', 'None', 'None', 'Fruit Infusions And Smoothies', 'Mixed Berries, Yogurt, Honey, Ice.', 'uploads/Berry Blast Smoothie.jpg'),
(21, 'Tropical Mango Smoothie', 'Indulge in a tropical paradise with this smoothie made from ripe mango, juicy pineapple, and creamy banana, all blended with yogurt. It\'s a sweet and fruity treat that transports you to the beach.', 'High', 'None', 'None', 'Fruit Infusions And Smoothies', 'Mango, Pineapple, Banana, Yogurt, Ice.', 'uploads/Tropical Mango Smoothie.jpg'),
(22, 'Chocolate Banana Smoothie', 'A decadent blend of ripe banana and rich cocoa powder, this smoothie combines chocolatey goodness with a creamy texture. Perfect for a quick breakfast or a satisfying dessert.', 'Medium', 'None', 'None', 'Fruit Infusions And Smoothies', 'Banana, Cocoa Powder, Milk (or dairy-free alternative), Ice.', 'uploads/Chocolate Banana Smoothie.jpg'),
(23, 'Strawberry Lemonade', 'Freshly made lemonade blended with ripe strawberries creates a sweet and tangy drink that is refreshing and vibrant. It\'s the perfect beverage for summer gatherings or picnics.', 'Medium', 'None', 'None', 'Fruit Infusions And Smoothies', 'Lemon Juice, Water, Sugar, Strawberries.', 'uploads/Strawberry Lemonade.jpg'),
(24, 'Orange Ginger Infusion', 'Bright and zesty, this infusion combines freshly squeezed orange juice with a hint of spicy ginger. This invigorating drink is perfect for boosting your energy and refreshing your palate.', 'Medium', 'None', 'None', 'Fruit Infusions And Smoothies', 'Orange Juice, Ginger, Water.', 'uploads/Orange Ginger Infusion.jpg'),
(25, 'Almond Croissant', 'This flaky, buttery croissant is filled with sweet almond paste and topped with slivered almonds for a delightful crunch. Perfect for breakfast or a mid-day treat with your coffee.', 'Medium', 'None', 'None', 'Pastry', 'Croissant Dough, Almond Paste, Sliced Almonds.', 'uploads/Almond Croissant.jpg'),
(26, 'Blueberry Muffin', 'Moist and fluffy, our blueberry muffin is bursting with fresh blueberries, making it a delightful snack or breakfast option. Each bite is a perfect balance of sweetness and fruitiness.', 'Medium', 'None', 'None', 'Pastry', 'Flour, Sugar, Blueberries, Eggs, Butter.', 'uploads/Blueberry Muffin.jpg'),
(27, 'Cheese Danish', 'A flaky pastry filled with a rich and creamy cream cheese filling, our cheese danish is both sweet and savory. It\'s the perfect complement to your morning coffee or as an afternoon snack.', 'Medium', 'None', 'None', 'Pastry', 'Puff Pastry, Cream Cheese, Sugar, Vanilla Extract.', 'uploads/Cheese Danish.jpg'),
(28, 'Chocolate Chip Cookies', 'These classic cookies are packed with gooey chocolate chips, delivering a rich chocolate flavor with every bite. They\'re the perfect sweet treat to enjoy with a glass of milk or coffee.', 'High', 'None', 'None', 'Pastry', 'Flour, Sugar, Butter, Chocolate Chips, Eggs.', 'uploads/Chocolate Chip Cookies.jpg'),
(29, 'Oatmeal Raisin Cookies', 'Chewy and hearty, our oatmeal raisin cookies are made with wholesome oats and sweet raisins, delivering a comforting flavor that’s perfect for any time of day.', 'Medium', 'None', 'None', 'Pastry', 'Oats, Flour, Sugar, Raisins, Butter.', 'uploads/Oatmeal Raisin Cookies.jpg'),
(30, 'Sugar Cookies', 'Soft and sweet, these cookies are delicately flavored with vanilla and are perfect for any occasion. Enjoy them plain or decorate them for a festive touch!', 'High', 'None', 'None', 'Pastry', 'Flour, Sugar, Butter, Vanilla Extract, Eggs.', 'uploads/Sugar Cookies.jpg'),
(31, 'Cinnamon Roll', 'A warm and gooey cinnamon roll filled with cinnamon sugar and topped with cream cheese frosting. This sweet, sticky pastry is a perfect treat for breakfast or dessert.', 'High', 'None', 'None', 'Pastry', 'Flour, Sugar, Butter, Cinnamon, Cream Cheese Frosting.', 'uploads/Cinnamon Roll.jpg'),
(32, 'Banana Bread', 'Moist and flavorful, our banana bread is made with ripe bananas and has a dense texture. It\'s perfect as a snack or a breakfast treat, and it pairs wonderfully with coffee.', 'Medium', 'None', 'None', 'Pastry', 'Ripe Bananas, Flour, Sugar, Eggs, Butter.', 'uploads/Banana Bread.jpg'),
(40, 'Caramel Macchiato', 'A classic espresso drink featuring rich, bold espresso combined with steamed milk and sweet caramel syrup, topped with a drizzle of caramel for a smooth, slightly sweet flavor that’s perfect for any time of day.', 'Medium', 'Medium', 'High', 'Coffee', 'Espresso, steamed milk, caramel syrup, caramel drizzle', 'uploads/Caramel Macchiato.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coffees`
--
ALTER TABLE `coffees`
  ADD PRIMARY KEY (`coffee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coffees`
--
ALTER TABLE `coffees`
  MODIFY `coffee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
