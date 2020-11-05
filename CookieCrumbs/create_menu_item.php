<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Add Menu Item';
include('header.php');
?>

    <form method="post" action="php_scripts/addMenuItem.php">
        <label for="item_name">Item Name:</label>
        <input type = "text" name = "item_name" required>
        <label for="item_price">Price:</label>
        <input type = "number" step = "0.01" name = "item_price" required>
        <label for="item_description">Description:</label>
        <input type = "text" name = "item_description" required>
        <label for="item_category">Category (Lunch, Dinner, etc.):</label>
        <input type = "text" name = "item_category" required>
        <label for="item_picture_name">Name of file for picture:</label>
        <input type = "text" name = "item_picture_name" required>
        <input type = "submit">
    </form>

<?php
include('footer.php');
?>