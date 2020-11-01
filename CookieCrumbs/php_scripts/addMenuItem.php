<?php
/*
    addMenuItem
*/
include_once('../includes/connection.php');
$addMenuItem = new addMenuItem();
class addMenuItem
{
    public function __construct()
    {
        $this->execute();
    }
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

    public function execute()
    {
        $this->addMenuItem();
    }
}
?>