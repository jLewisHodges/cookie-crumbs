<?php
class MenuItem{
    private $item_id;
    private $item_name;
    private $item_price;
    private $item_description;
    private $item_picture_name;

    //Methods 

    //setter and getter for name
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    //setter and getter for price
    function setPrice($price){
        $this->price = $price;
    }
    function getPrice(){
        return $this->price;
    }
    //setter and getter for ingredients
    function setIngredients($ingredients){
        $this->ingredient = $ingredients;
    }
    function getIngredients(){
        return $this->ingredient;
    }
}
?>