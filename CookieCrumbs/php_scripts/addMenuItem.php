<?php
/*
    addMenuItem
*/
ini_set('display_errors', 'on');
error_reporting(E_ALL);

include_once('../includes/connection.php');
$addMenuItem = new addMenuItem();
$addMenuItem->addMenuItem();
class addMenuItem
{
    public function addMenuItem()
    {
        $db = new Connection();
        $sql = "INSERT INTO menu_items (item_name, item_price, item_description, item_picture_name) VALUES (?, ?, ?, ?)";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if($stmt = mysqli_prepare($db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "ssss", $item_name, $item_price, $item_description, $item_picture_name);
                $item_name = $_REQUEST["item_name"];
                $item_price = $_REQUEST["item_price"];
                $item_description = $_REQUEST["item_description"];
                $item_picture_name = $_REQUEST["item_picture_name"];
                if(mysqli_stmt_execute($stmt))
                {
                    echo "Menu Item added succesfully";
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not create menu item\n";
                echo mysqli_error($db->conn);
            }
        }

        mysqli_stmt_close($stmt);

        
    }
}
?>