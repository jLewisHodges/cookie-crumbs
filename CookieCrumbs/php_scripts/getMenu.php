
<?php
/*
totalSales - sums all sales in the database and returns the value 

returns the value if total > 0
else returns -1
*/
include_once(__DIR__."/../config.php");
include_once('../includes/connection.php');
include("../classes/MenuItem.php");


$db = new Connection();
$sql = "SELECT * FROM menu_items";

$result = $db->conn->query($sql);
$menu=array();
while($row = $result->fetch_assoc()){
    //echo implode($row);
    $menu[] = new MenuItem($row["item_id"], $row["item_name"],$row["item_price"],$row["item_description"],$row["item_category"],$row["item_picture_name"]);  
}

$db->conn->close();
echo implode($menu);

?>

