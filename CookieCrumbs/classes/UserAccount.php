<?php
    class UserAccount
    {
        private $fName;
        private $lName;
        private $email;
        private $id;
        private $isEmployee;
        private $isManager;

        function __construct($id, $fName, $lName, $email, $isEmployee, $isManager)
        {
            $this->id = $id;
            $this->fName = $fName;
            $this->lName = $lName;
            $this->email = $email;
            $this->isEmployee = $isEmployee;
            $this->isManager = $isManager;
        }
        public function __toString()
        {
            echo $this->fName;
        }
        public function getUserId()
        {
            return $this->id;
        }
        public function getFirstName()
        {
            return $this->fName;
        }
        public function getLastName()
        {
            return $this->lName;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function isEmployee()
        {
            return $this->isEmployee;
        }
        public function isManager()
        {
            return $this->isManager;
        }


        public function setFirstName($fName)
        {
            $this->fName = $fName;
        }
        public function setLastName($lName)
        {
            $this->lName = $lName;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
    } 
?>