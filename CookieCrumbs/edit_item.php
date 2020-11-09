<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Edit Menu Item';
include('header.php');
?>
    <br>
    <div>
        <h2>Edit Menu Item</h2><br>

    </div>
    <br>
    
    <?php
    include_once('config.php');
    include_once(SITE_ROOT."/includes/connection.php");

    $db = new Connection();
    $sql = "SELECT * FROM menu_items WHERE item_id=".$_GET["id"];

    $result = $db->conn->query($sql)->fetch_assoc();
    echo 
    '<form method="post" action="php_scripts/editMenuItem.php">
        <input type="hidden" name="item_id" value='.$_GET["id"].'/>
        <label for="item_name">Item Name:</label>
        <input type = "text" name = "item_name" value="' . $result['item_name'] . '"required><br><br>
        <label for="item_price">Price:</label>
        <input type = "number" step = "0.01" name = "item_price" value="' . $result['item_price'] . '" required><br><br>
        <label for="item_description">Description:</label>
        <input type = "text" name = "item_description"  value="' . $result['item_description'] . '"required><br><br>
        <label for="item_category">category:</label>
        <select name = "item_category"  class="select-css">
            <option value="Appetizer"';if($result['item_category'] == 'Appetizer'){echo "selected";}echo '>Appetizer</option>
            <option value="Breakfast"';if($result['item_category'] == 'Breakfast'){echo "selected";}echo '>Breakfast</option>
            <option value="Lunch"';if($result['item_category'] == 'Lunch'){echo "selected";}echo '>Lunch</option>
            <option value="Dinner"';if($result['item_category'] == 'Dinner'){echo "selected";}echo '>Dinner</option>
        </select><br><br>
        <label for="item_picture_name">Name of file for picture:</label>
        <input type = "text" name = "item_picture_name" value="' . $result['item_picture_name'] . '" required><br><br>
        <input type = "submit">
    </form>';
    ?>

<?php
include('footer.php');
?>