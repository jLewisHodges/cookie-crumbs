<?php
/*
    editMenuItem
*/
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/includes/connection.php");
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
        $sql = "UPDATE menu_items SET item_name=?, item_price=?, item_description=?, item_category=?, item_picture_name=? WHERE menu_items.item_id=?";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if($stmt = mysqli_prepare($db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "ssssss", $item_name, $item_price, $item_description, $item_category, $item_picture_name,$item_id);
                $item_name = $_POST["item_name"];
                $item_price = $_POST["item_price"];
                $item_description = $_POST["item_description"];
                $item_category = $_POST["item_category"];
                $item_picture_name = $_POST["item_picture_name"];
                $item_id=$_POST["item_id"];
                if(mysqli_stmt_execute($stmt))
                {
                    header('Location:../menu_update_confirmation.php');
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