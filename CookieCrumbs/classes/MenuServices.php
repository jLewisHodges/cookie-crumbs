<?php
    include_once(__DIR__."/../config.php");
    include_once(SITE_ROOT."/includes/connection.php");
    include_once(SITE_ROOT."/classes/MenuItem.php");

    class MenuServices
    {
        private $db;
        private $menuItemArray;
        private $innerHTML;

        function __construct()
        {
            $this->db = new Connection();
            $this->menuItemArray = array();
            $this->innerHTML = "";
            $this->innerEditHTML = "";
        }

        public function execute()
        {
            $this->getMenuItems();
            $this->createHTML();
            $this->createEditHTML();
        }

        public function getMenuItemById($id)
        {
            $resultArray = $this->db->getMenuItemById($id);
            $item = new MenuItem($resultArray['item_id'], $resultArray['item_name'], $resultArray['item_price'], $resultArray['item_description'], $resultArray['item_category'], $resultArray['item_picture_name'], $resultArray['make_time']);
            return $item;
        }

        //gets all menu items in the database and creates MenuItem object array for them
        private function getMenuItems()
        {
            $sql = "SELECT * FROM menu_items";
            if($result = $this->db->conn->query($sql))
            {
                while($resultArray = $result->fetch_assoc())
                {
                    array_push($this->menuItemArray, new MenuItem($resultArray['item_id'], $resultArray['item_name'], $resultArray['item_price'], $resultArray['item_description'], $resultArray['item_category'], $resultArray['item_picture_name'], $resultArray['make_time']));
                }
            }
        }

        private function createHTML()
        {
            foreach($this->menuItemArray as $item)
            {
                $this->innerHTML = $this->innerHTML . "<div class=\"menuItem\"id=\"menuItem\"".$item->getItem_id()."\"><div id=\"column\">\n<img height=\"100px\" width=auto src=\"images/".$item->getItem_picture_name()."\"></div>\n<div id=\"column\"><h4>".$item->getItem_name()."</h3><p></p>\n<h6>".$item->getItem_description()."</h6></div>\n<div id=\"column\"><h3>$".$item->getItem_price()."</h3><a href=\"php_scripts/addToCart.php?id=".$item->getItem_id()."\"><img src=\"images/plus.png\" id =\"addToCart\"></a></div>\n</div>";
            }
        } 
        private function createEditHTML()
        {
            foreach($this->menuItemArray as $item)
            {
                $this->innerEditHTML = $this->innerEditHTML . "<a href=\"#\" onclick=\"addItem(".$item->getItem_id().");\"><div class=\"menuItem\"id=\"menuItem\"".$item->getItem_id()."\"><div id=\"column\">\n<img height=\"100px\" width=auto src=\"images/".$item->getItem_picture_name()."\"></div>\n<div id=\"column\"><h4>".$item->getItem_name()."</h3><p></p>\n<h6>".$item->getItem_description()."</h6></div>\n<div id=\"column\"><h3>$".$item->getItem_price()."</h3><a href=\"edit_item.php?id=".$item->getItem_id()."\"><img src=\"images/edit.png\" style=\"width:20px;height:20px;border-radius: 0px;\"></a><a href=\"create_menu_item.php\"><img src=\"images/delete.png\" style=\"width:20px;height:20px;border-radius: 0px;\"></a></div>\n</div></a>";
            }
        }  

        public function getEditResult()
        {
            return $this->innerEditHTML;
        }

        public function getresult()
        {
            return $this->innerHTML;
        }
    }
?>