<?php
class MenuItem{
    private $item_id;
    private $item_name;
    private $item_price;
    private $item_description;
    private $item_category;
    private $item_picture_name;

    //Methods 
    function __construct($item_id, $item_name, $item_price, $item_description, $item_category, $item_picture_name)
    {
        $this->item_id = $item_id;
        $this->item_name = $item_name;
        $this->item_price = $item_price;
        $this->item_description = $item_description;
        $this->item_category = $item_category;
        $this->item_picture_name = $item_picture_name;
    }
    
    function setItem_id($id){
        $this->item_id = $id;
    }
    function getItem_id(){
        return $this->item_id;
    }

    function setItem_category($category)
    {
        $this->item_category = $category;
    }

    function getItem_category()
    {
        return $this->item_category;
    }

    //setter and getter for name
    function setItem_name($name){
        $this->item_name = $name;
    }
    function getItem_name(){
        return $this->item_name;
    }
    //setter and getter for price
    function setItem_price($price){
        $this->item_price = $price;
    }
    function getItem_price(){
        return $this->item_price;
    }
    //setter and getter for ingredients
    function setItem_description($description){
        $this->item_description = $description;
    }
    function getItem_description(){
        return $this->item_description;
    }
    function setItem_picture_name($picture){
        $this->item_picture_name = $picture;
    }
    function getItem_picture_name(){
        return $this->item_picture_name;
    }
}
?>