<?php
    class UserAccount
    {
        private $fName;
        private $lName;
        private $email;

        function __construct($fName, $lName, $email)
        {
            $this->fName = $fName;
            $this->lName = $lName;
            $this->email = $email;
        }

        public function __toString()
        {
            echo $this->fName;
        }
    } 
?>