<?php
    class Orders
    {
        private $orderList;

        function __construct()
        {
           $orderList = array(); 
        }

        public function setOrderList($orderList)
        {
            $this->orderList = $orderList;
        }

        public function getSummaryHTML()
        {
            $html = "";
            foreach($this->orderList as $order)
            {
                $html = $html.$order->getSummaryHTML();
            }
            return $html;
        }
    }
?>