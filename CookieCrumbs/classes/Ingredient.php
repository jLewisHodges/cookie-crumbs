<?php
    /*
    Ingredient.php - a simple ingredient object
    */
    class Ingredient {
        private $name;
        private $caloriesPerGram;
        private $amountInGrams;

        function setName($name){
            $this->name = $name;
        }
        function getName(){
            return $this->name;
        }

        function setCaloriesPerGram($caloriesPerGram){
            $this->caloriesPerGram = $caloriesPerGram;
        }
        function getCaloriesPerGram(){
            return $this->caloriesPerGram;
        }

        function setAmountInGrams($amountInGrams){
            $this->amountInGrams = $amountInGrams;
        }
        function getAmountInGrams(){
            return $this->amountInGrams;
        }
        

    }
?>