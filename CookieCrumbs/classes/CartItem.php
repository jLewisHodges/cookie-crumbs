<?php
    include_once(__DIR__."/../config.php");
    include_once(SITE_ROOT."/classes/MenuItem.php");
    class CartItem
    {
        private $menuItem;
        private $quantity;

        function __construct($menuItem)
        {
            $this->menuItem = $menuItem;
            $this->quantity = 1;
        }

        public function getQuantity()
        {
            return $this->quantity;
        }

        public function addQuantity()
        {
            $this->quantity++;
        }

        public function setQuantity($quantity)
        {
            $this->quantity = $quantity;
        }

        public function getMenuItem()
        {
            return $this->menuItem;
        }

        public function subQuantity()
        {
            $this->quantity--;
        }
    }
?>