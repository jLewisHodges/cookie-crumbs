<?php
    class UserAccount
    {
        private $fName;
        private $lName;
        private $email;
        private $id;
        private $isEmployee;
        private $isManager;
        private $address;
        private $apt;
        private $zip;
        private $city;
        private $state;
        function __construct($id, $fName, $lName, $email, $isEmployee, $isManager, $address, $apt, $city, $state, $zip)
        {
            $this->id = $id;
            $this->fName = $fName;
            $this->lName = $lName;
            $this->email = $email;
            $this->isEmployee = $isEmployee;
            $this->isManager = $isManager;
            $this->address = $address;
            $this->apt = $apt;
            $this->city = $city;
            $this->state = $state;
            $this->isManager = $isManager;
            $this->zip = $zip;
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
        public function getAddress()
        {
            return $this->address;
        }
        public function getApt()
        {
            return $this->apt;
        }
        public function getCity()
        {
            return $this->city;
        }
        public function getState()
        {
            return $this->state;
        }
        public function getZip()
        {
            return $this->zip;
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
        public function displayUserInfo()
        {
            
        }
    } 
?>