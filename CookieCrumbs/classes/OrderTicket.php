<?
/*
    author: Jorden Hodges
    class: OrderTicket
    Description: Read only object for holding information for a current order
    to be used to display the information across different interfaces.
*/
    include_once('../icludes/connection.php');
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
        public function __construct($orderNum, $id, $dateTime, $tableNum, $menuItems, $isDelivery, $isPaid, $estimatedCompletionTime, $totalPrice, $sales_credit)
        {
            $this->orderNum = $orderNum;
            $this->id = $id;
            $this->dateTime = $dateTime;
            $this->tableNum = $tableNum;
            $this->menuItems = $menuItems;
            $this->isDelivery = $isDelivery;
            $this->isPaid = $isPaid;
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
    } 


?>