<?php
/*
    author: Jorden Hodges
    class: OrderTicket
    Description: Read only object for holding information for a current order
    to be used to display the information across different interfaces.
*/
    include_once(__DIR__."/../config.php");
    include_once(SITE_ROOT."/includes/connection.php");
    class OrderTicket
    {
        private $orderNum;
        //customer name
        private $id;
        private $dateTime;
        //only applicable for dine in orders
        private $tableNum;
        //items ordered
        private $menuItems;
        //pickup, server, etc
        private $isDelivery;
        private $isPaid;
        private $estimatedCompletionTime;
        private $totalPrice;
        private $sales_credit;

        //constructor
        public function __construct($orderNum, $id, $tableNum, $menuItems, $isDelivery, $estimatedCompletionTime, $totalPrice, $sales_credit)
        {
            $this->orderNum = $orderNum;
            $this->id = $id;
            $this->dateTime = time();
            $this->tableNum = $tableNum;
            $this->menuItems = $menuItems;
            $this->isDelivery = $isDelivery;
            $this->isPaid = 0;
            $this->estimatedCompletionTime = $estimatedCompletionTime;
            $this->totalPrice = $totalPrice;
            $this->sales_credit = $sales_credit;
        }

        //getter methods
        public function __get($name) 
        {
            if(property_exists($this, $name))
                return $this->$name;
        }

        public function __toString()
        {
            return $this->orderNum;
        }

        public function getHTML()
        {

        }

    } 


?>