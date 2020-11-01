<?php
/*
    author: Jorden Hodges
    OrderFinder.php - this file simply finds the order that is being searched for and creates a Order Ticket object for it.
    */
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
        function getById($id)
        {
            $orderArray = array();
            $this->db->selectFromPlacedOrders("user_id", $id);
        }

        /*
            method getByOrderNumber
            retrieves order information by Order Number'
            returns orderTicket object
            returns NULL if not found
        */
        function getByOrderNumber()
        {

        }
    }