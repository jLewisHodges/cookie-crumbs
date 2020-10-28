<?php
    class Connection
    {
        protected $dbServerName = "localhost";
        protected $dbUserName = "u325576875_JordenHodges";
        protected $dbPassword = "csci490Team2";
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