<?php
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/classes/MenuItem.php");
include_once(SITE_ROOT."/classes/CartItem.php");

    class Cart
    {
            private $itemList;
            private $innerHTML;
            
            function __construct()
            {
                $this->itemList = array();
                $this->innerHTML = "";
            }

            public function getHTML()
            {
                foreach($this->itemList as $item)
                {
                    $this->innerHTML = $this->innerHTML . "<div class=\"menuItem\"id=\"menuItem\"".$item->getMenuItem()->getItem_id()."\"><div id=\"column\">\n<img height=\"100px\" width=auto src=\"images/".$item->getMenuItem()->getItem_picture_name()."\"></div>\n<div id=\"column\"><h4>".$item->getMenuItem()->getItem_name()."</h3><p></p>\n<h6>".$item->getMenuItem()->getItem_description()."</h6></div>\n<div id=\"column\"><h3>$".$item->getMenuItem()->getItem_price()."</h3><div id=\"itemControls\"><a href=\"php_scripts/removeFromCart.php?id=".$item->getMenuItem()->getItem_id()."\"><img src=\"images/minus.png\" id =\"removeFromCart\"></a><h3 id=\"itemQuant\">".$item->getQuantity()."</h3><a href=\"php_scripts/addToCart.php?id=".$item->getMenuItem()->getItem_id()."\"><img src=\"images/plus.png\" id =\"addToCart\"></a></div></div>\n</div>";
                }
                return $this->innerHTML;
            }

            public function getTotal()
            {
                $total = 0;
                foreach($this->itemList as $item)
                {
                    $total += ($item->getQuantity()*$item->getMenuItem()->getItem_price());
                }
                return $total;
            }

            public function getConfHTML()
            {
                foreach($this->itemList as $item)
                {
                    $this->innerHTML = $this->innerHTML . "<div class=\"menuItem\"id=\"menuItem\"".$item->getMenuItem()->getItem_id()."\"><div id=\"column\">\n<img height=\"100px\" width=auto src=\"images/".$item->getMenuItem()->getItem_picture_name()."\"></div>\n<div id=\"column\"><h4>".$item->getMenuItem()->getItem_name()."</h3><p></p>\n<h6>".$item->getMenuItem()->getItem_description()."</h6></div>\n<div id=\"column\"><h3>$".$item->getMenuItem()->getItem_price()."</h3><div id=\"itemControls\"><h3 id=\"itemQuant\">".$item->getQuantity()."</h3></div></div>\n</div>";
                }
                $this->innerHTML = $this->innerHTML . "<div id=\"total\"><h3>Total: $".$this->getTotal()."</h3></div>";
                return $this->innerHTML;
            }

            public function addItem($menuItem)
            {
                $found = false;
                foreach($this->itemList as $cItem)
                {
                    if($cItem->getMenuItem()->getItem_id() == $menuItem->getItem_id())
                    {
                        $cItem->addQuantity();
                        $found = true;
                    }
                }
                if(!$found)
                    array_push($this->itemList, new CartItem($menuItem));
            }
            public function removeItem($menuItem)
            {
                for($i=0; $i<sizeof($this->itemList); $i++)
                {
                    echo $this->itemList[$i]->getMenuItem()->getItem_id();
                    if($this->itemList[$i]->getMenuItem()->getItem_id() == $menuItem->getItem_id())
                    {
                        
                        if($this->itemList[$i]->getQuantity() == 1)
                        {
                            unset($this->itemList[$i]);
                            echo "unsetting item";
                        }
                        else
                        {
                            $this->itemList[$i]->subQuantity();
                            echo "removing item";
                        }
                    }
                }
            }
            public function getItemList()
            {
                return $this->itemList;
            }
            public function __toString()
            {
                foreach($this->itemList as $item)
                {
                    echo $item->__toString();
                }
            }
    }
?>