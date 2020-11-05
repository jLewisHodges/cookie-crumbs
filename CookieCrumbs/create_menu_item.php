<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Add Menu Item';
include('header.php');
?>
    <br>
    <div>
        <h2>Add New Menu Item</h2>
    </div>
    <br>
    <form method="post" action="php_scripts/addMenuItem.php">
        <label for="item_name">Item Name:</label>
        <input type = "text" name = "item_name" required>
        <label for="item_price">Price:</label>
        <input type = "number" step = "0.01" name = "item_price" required>
        <label for="item_description">Description:</label>
        <input type = "text" name = "item_description" required>
        <label for="item_category">category:</label>
        <select name = "item_category"  class="select-css">
            <option value="Appetizer">Appetizer</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>
        <label for="item_picture_name">Name of file for picture:</label>
        <input type = "text" name = "item_picture_name" required>
        <input type = "submit">
    </form>

<?php
include('footer.php');
?>