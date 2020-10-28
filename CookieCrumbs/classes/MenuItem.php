<?php
class MenuItem{
    private $name;
    private $price;
    private $ingredient=array();

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
    function setIngredients(array $ingredients){
        $this->ingredient = $ingredients;
    }
    function getIngredients(){
        return $this->ingredient;
    }
}
?>