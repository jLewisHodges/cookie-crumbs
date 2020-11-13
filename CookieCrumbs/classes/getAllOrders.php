<?php
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/includes/connection.php");
class getAllOrders
    {
        private $db;
        private $menuItemArray;
        private $innerHTML;

        function __construct()
        {
            $this->db = new Connection();
            $this->innerHTML = "";
        }

        public function execute()
        {
            $this->getMenuItems();
            $this->createHTML();
        }

        //gets all menu items in the database and creates MenuItem object array for them
        private function getMenuItems()
        {
            $sql = "SELECT * FROM placed_orders";
            if($result = $this->db->conn->query($sql))
            {
                while($resultArray = $result->fetch_assoc())
                {
                    
                }
            }
        }

        private function createHTML()
        {
            foreach($this->menuItemArray as $item)
            {
               
            }
        }

        public function getresult()
        {
            return $this->innerHTML;
        }
    }
?>
?>

