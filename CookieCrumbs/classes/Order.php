<?php
    /*
        Order.php - a simple order object
    */
    class Order {
        private $name;
        private $orderTime;
        private $orderItems = array();
        private $status;

        function setName($name){
            $this->name = $name;
        }
        function getName(){
            return $this->name;
        }

        function getOrderTime(){
            return $this->orderTime;
        }

        function setOrderItems(array $items){
            $this->orderItems = $items;
        }
        function getOrderItems(){
            return $this->orderItems;
        }

        function setStatus($status){
            $this->status = $status;
        }
        function getStatus(){
            return $this->status;
        }

        function timeSinceOrder(){
            return $this->orderTime;
        }      

    }
?>