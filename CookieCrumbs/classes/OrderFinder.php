<?php
/*
    author: Jorden Hodges
    OrderFinder.php - this file simply finds the order that is being searched for and creates a Order Ticket object for it.
*/
//use WaiterDashBoardServices\OrderTicket;
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/includes/connection.php");
include_once(SITE_ROOT."/classes/OrderTicket.php");
include_once(SITE_ROOT."/classes/MenuItem.php");


    class OrderFinder
    {
        private $db;
        private $order;

        public function __construct()
        {
            $this->db = new Connection();
        }
        /*
            method getByName
            finds orders with name on the order
        */
        public function getById($id)
        {
            $orderArray = $this->db->selectFromPlacedOrders("user_id", $id);
        }

        /*
            method getByOrderNumber
            retrieves order information by Order Number'
            returns orderTicket object
            returns NULL if not found
        */
        public function getByOrderNumber($orderNumber)
        {
            $orderArray = $this->db->selectFromPlacedOrders("order_number", $orderNumber);

        }

        private function createOrderTicket($orderArray)
        {
            return new OrderTicket($orderArray['order_number'], $orderArray['user_id'], $orderArray['date_time'], $orderArray['table_number'], $orderArray['item_list'], $orderArray['isDelivery'],  $orderArray['isPaid'], $orderArray['ETA'], $orderArray['sales_credit']);
        }

        /*
            method findAllOrdersByUserId
            retrieves all orders according to the 
            users Id in a list in order by when they were placed
            returns NULL if no orders are found
            
        */
        public function findAllOrdersByUserId($id)
        {
            $orderList = array();
            $sql = "SELECT * FROM placed_orders WHERE user_id = ".$id;
            if($result = $this->db->conn->query($sql))
            {
                while($orderArray = $result->fetch_assoc())
                {
                    $sql2 = "SELECT * FROM order_items WHERE order_id = ".$orderArray['order_id'];
                    if($itemResult = $this->db->conn->query($sql2))
                    {
                        $menuItems = array();
                        while($itemArray = $itemResult->fetch_assoc())
                        {
                            $sql3 = "SELECT * FROM menu_items WHERE item_id = ".$itemArray['item_id'];
                            if($menuItemResult = $this->db->conn->query($sql3))
                            {
                                while($menuItemArray = $menuItemResult->fetch_assoc())
                                {
                                    array_push($menuItems, new MenuItem($menuItemArray['item_id'], $menuItemArray['item_name'], $menuItemArray['item_price'], $menuItemArray['item_description'], $menuItemArray['item_category'], $menuItemArray['item_picture_name'], $menuItemArray['make_time']));
                                }
                            }
                        }
                    }
                    array_push($orderList, new OrderTicket($orderArray['order_id'], $orderArray['user_id'], $orderArray['table_number'], $menuItems, $orderArray['isDelivery'], $orderArray['table_number'], $orderArray['sale_amount'], $orderArray['sales_credit']));
                }
            }
            return $orderList;
        }
    }