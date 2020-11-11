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

        public function getMenuItemById($id)
        {
            $sql = "SELECT * FROM menu_items WHERE item_id=?";
            if($stmt = $this->conn->prepare($sql))
            {
                $itemId = 0;
                $stmt->bind_param("s", $itemId);
                $itemId = $id;
                if($stmt->execute())
                {
                    if(!$result = $stmt->get_result())
                    {
                        echo "fail";
                    }
                    if(!$itemArray = $result->fetch_assoc())
                    {
                        echo "could not make associative array";
                    }
                    return $itemArray;
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not make account\n";
                echo mysqli_error($this->db->conn);
            }
        }

        public function getUserInfoByEmail($email)
        {
            $sql = "SELECT * FROM users WHERE email_address=?";
            if($stmt = $this->conn->prepare($sql))
            {
                $emailAddress = "";
                $stmt->bind_param("s", $emailAddress);
                $emailAddress = $email;
                if($stmt->execute())
                {
                    if(!$result = $stmt->get_result())
                    {
                        echo "fail";
                    }
                    if(!$accountInfo = $result->fetch_assoc())
                    {
                        echo "could not make associative array";
                    }
                    return $accountInfo;
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not make account\n";
                echo mysqli_error($this->db->conn);
            }
        }
        public function getAddressByID($id)
        {
            $sql = "SELECT * FROM addresses WHERE user_id=?";
            if($stmt = $this->conn->prepare($sql))
            {
                $user_id = 0;
                $stmt->bind_param("d", $user_id);
                $user_id = $id;
                if($stmt->execute())
                {
                    if(!$result = $stmt->get_result())
                    {
                        echo "fail";
                    }
                    else
                    {
                        if(!$addressInfo = $result->fetch_assoc())
                        {
                            echo "could not make associative array";
                        }
                        return $addressInfo;
                    }
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not make account\n";
                echo mysqli_error($this->db->conn);
            }
        }
        public function getUserInfoById($table, $id)
        {
            $sql = "SELECT * FROM ? WHERE 'user_id' =?";
            if($stmt = $this->conn->prepare($sql))
            {
                $stmt->bind_param("ss", $table, $id);
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
    }
?>