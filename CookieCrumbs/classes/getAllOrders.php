<?php
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/includes/connection.php");
class getAllOrders
    {
        private $db;
        private $innerHTML;

        function __construct()
        {
            $this->db = new Connection();
            $this->innerHTML = '';
            $this->getMenuItems();

        }

        
        private function getMenuItems()
        {

            $innerHTML='';
            $order_id="";
            $sql = "SELECT users.first_name, placed_orders.order_id, placed_orders.table_number, placed_orders.isDelivery FROM placed_orders JOIN users ON placed_orders.user_id = users.user_id";

            $sql2 = "SELECT menu_items.item_name FROM menu_items JOIN order_items on menu_items.item_id = order_items.item_id WHERE order_items.order_id = ?";
            $stmt = $this->db->conn->prepare($sql2);
            $stmt->bind_param("s",$order_id);

            if($result = $this->db->conn->query($sql))
            {
                while($resultArray = $result->fetch_assoc())
                {
                    $innerHTML = $innerHTML . 
                    '<div class="orderStub">
                    <p class="orderNum">'.$resultArray['order_id'].'</p>
                    <p class="orderName">'.$resultArray['first_name'].'</p>
                    <p class="orderMethod">';
                    if($resultArray['isDelivery'] == 0){
                        $innerHTML = $innerHTML.'Dine in';
                    }
                    else{
                        $innerHTML = $innerHTML.'Delivery';
                    }
                    $innerHTML = $innerHTML.'</p>
                    <hr style="height:2px;border-width:0;color:black;background-color:black">
                    <ul class="orderItems">';
                    $order_id = $resultArray['order_id'];
                    $stmt->execute();
                    $item_result = $stmt->get_result();
                    while($item_resultArray = $item_result->fetch_assoc()){
                        $innerHTML = $innerHTML.'<li>'.$item_resultArray['item_name'].'</li>';
                    }
                    $innerHTML = $innerHTML.'</ul></div>';
                }
                $this->innerHTML=$innerHTML;
            }
        }

        public function getResult()
        {
            echo $this->innerHTML;
        }
    }
?>

