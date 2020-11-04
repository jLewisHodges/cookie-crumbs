<?php
    class Cart
    {
            private $itemList;
            
            function __construct()
            {
                
            }

            public function addItem($menuItem)
            {
                $this->itemList->array_push($menuItem);
            }
            public function removeItem()
            {
                
            }
    }
?>