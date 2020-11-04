<?php
/*
    author: Jorden Hodges
    OrderFinder.php - this file simply finds the order that is being searched for and creates a Order Ticket object for it.
*/

use WaiterDashBoardServices\OrderTicket;

include_once('../includes/connection.php');
include('OrderTicket.php');

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
    }