<?php
    class Connection
    {
        protected $dbServerName = "localhost";
        protected $dbUserName = "jorden";
        protected $dbPassword = "cs2C8ee2ccD4Q.7";
        protected $dbName = "cookie_crumbs";
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
            else
            {
                echo "connection sucessful";
            }
        }

        private function createTables()
        {
            $usersTable = mysqli_query($this->conn, 'select 1 from users LIMIT 1');

            if($usersTable != FALSE)
            {
                
            }
            else
            {
                $sql = "CREATE TABLE `users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(20) NOT NULL , `last_name` VARCHAR(20) NOT NULL , `email_address` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB;";

                if($this->conn->query($sql) === TRUE)
                {
                    echo "table users created successfully";
                }
                else{
                    echo "Error creating users table." . $this->conn->error;
                }
            }
        }
    }
?>