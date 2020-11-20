<?php
/*
    author: Jorden Hodges
    class: OrderTicket
    Description: Read only object for holding information for a current order
    to be used to display the information across different interfaces.
*/
    include_once(__DIR__."/../config.php");
    include_once(SITE_ROOT."/includes/connection.php");
    include_once(SITE_ROOT."/classes/Cart.php");
    include_once(SITE_ROOT."/classes/CartItem.php");
    include_once(SITE_ROOT."/classes/AccountInfo.php");
    class OrderTicket
    {
        private $orderNum;
        //customer name
        private $id;
        private $date;
        private $time;
        //only applicable for dine in orders
        private $tableNum;
        //items ordered
        private $cart;
        //pickup, server, etc
        private $isDelivery;
        private $isPaid;
        private $estimatedCompletionTime;
        private $totalPrice;
        private $sales_credit;

        //constructor
        public function __construct($orderNum, $id, $tableNum, $cart, $isDelivery, $estimatedCompletionTime, $totalPrice, $sales_credit, $dateTime)
        {
            $this->orderNum = $orderNum;
            $this->id = $id;
            $DT = explode(" ", $dateTime);
            $this->date= $DT[0];
            $this->time= $DT[1];
            $this->tableNum = $tableNum;
            $this->cart = $cart;
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

        public function getSummaryHTML()
        {
            if($this->isDelivery == 0)
            {
                $orderImage = "pickup-icon.png";
            }
            else
            {
                $orderImage = "delivery-icon.png";
            }
            if($this->date >= date("Y-m-d"))
            {
                if(time() <= strtotime($this->time))
                    $completionTime = "Completed at ".date("g:i a",strtotime("+".$this->estimatedCompletionTime." minutes",strtotime($this->time)));
                else
                {
                    $completionTime = "Estimated completion at ".date("g:i a",strtotime("+".$this->estimatedCompletionTime." minutes",strtotime($this->time)));
                }
            }
            else
            {
                $completionTime = "Completed at ".date("g:i a",strtotime("+".$this->estimatedCompletionTime." minutes",strtotime($this->time)));
            }
            
            return "<a href=\"view_order.php?orderNum=".$this->orderNum."\"><div class=\"menuItem\"id=\"menuItem\"".$this->orderNum."\"><div id=\"column\">\n<img height=\"100px\" width=auto src=\"images/".$orderImage."\"></div>\n<div id=\"column\"><h4>Placed on: ".date_format(date_create($this->date), "m/d/Y")."</h4><p></p>\n<h4>at ".date("g:i a",strtotime($this->time))."</h4><p></p>\n<h4>".$completionTime."</h6></div>\n<div id=\"column\"><h3>Total: $".$this->totalPrice."</h3></div>\n</div></a>";
        }

        public function getFullHTML()
        {
            $accountInformation = unserialize($_SESSION['accountInformation']);
            $html = $this->getSummaryHTML();
            $html = $html.'</a><h3>Items Ordered</h3>';
            $html = $html.$this->cart->getConfHTML();
            if($this->isDelivery == true)
            {
                $html = $html.'</a><h3>Delivery Address</h3>';
                $html = $html.$accountInformation->getHTML();
            }
            return $html;
        }

    } 


?>