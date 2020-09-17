<?php
/*
    author: Jorden Hodges
    OrderFinder.php - this file simply finds the order that is being searched for and creates a Order Ticket object for it.
*/
include_once('../includes/connection.php');
include('OrderTicket.php');

$order;
    class OrderFinder
    {
        private $order;
        /*
            method getByName
            finds order number with name on the order then calls getByOrderNumber
        */
        function getByName()
        {

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
