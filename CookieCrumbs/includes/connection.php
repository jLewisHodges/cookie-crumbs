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
        public function selectFromPlacedOrders($key, $value)
        {
            $sql = "SELECT * FROM placed_orders WHERE ?=?";
            if($stmt = $this->db->conn->prepare($sql))
            {
                $stmt->bind_param("ss", $key, $value);
                if($stmt->execute())
                {
                    if(!$result = $stmt->get_result())
                    {
                        echo "fail";
                        if(!$row = $result->fetch_assoc())
                            echo "could not create assoc array";
                        else
                            return $row;
                    }
                    else
                        return $result;
                    echo "Account found succesfully";
                }
                else
                    echo "query failed";
            }
            else
                echo "statement could not be created";
        }

        public function close()
        {
            $this->conn->close();
        }
    }
?>