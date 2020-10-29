<?php
    class Connection
    {
        protected $dbServerName = "185.224.138.112";
        protected $dbUserName = "u325576875_JordenHodges";
        protected $dbPassword = "Password1";
        protected $dbName = "u325576875_CookieCrumbs";
        public $conn;

        function __construct()
        {
            $this->connect();
        }

        public function connect()
        {
            $this->conn = mysqli_connect($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
            if($this->conn->connect_error)
            {
                die("Connection Failed: " . $this->conn->connect_error);
            } 
        }
    }
?>