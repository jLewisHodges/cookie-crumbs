<?php
/*
    addUser 
*/

ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once('../includes/connection.php');
include_once('login.php');
$addUser = new addUser();
class addUser
{
    public function __construct()
    {
        if($this->userExists())
            echo "User already exists!";
        else
            $this->execute();
    }
    //check if user exists already
    private function userExists()
    {
        $db = new Connection();
        $sql = "Select * FROM users WHERE email_address='" . $_REQUEST["eaddr"] . "'";
        if($result = $db->conn->query($sql))
        {
            $rows = mysqli_num_rows($result);
            if($rows >= 1)
                return true;
        }
        return false;
    }

    //creates user in database
    private function createUser()
    {
        $db = new Connection();
        $sql = "INSERT INTO users (first_name, last_name, email_address, password) VALUES (?, ?, ?, ?)";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if($stmt = mysqli_prepare($db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $email, $password);
                $fName = $_REQUEST["fname"];
                $lName = $_REQUEST["lname"];
                $email = $_REQUEST["eaddr"];
                $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
                if(mysqli_stmt_execute($stmt))
                {
                    echo "Account added succesfully";
                }
                else
                {
                    echo "ERROR: Could not execute query: $sql. ";
                }
            }
            else
            {
                echo "could not make account\n";
                echo mysqli_error($db->conn);
            }
        }
        mysqli_stmt_close($stmt);
        $db->close();
        $this->login($email, $_REQUEST['password']);
    }

    public function login($email, $password)
    {
        $login = new Login();
        $login->constructer($email, $password);
    }

    public function execute()
    {
        $this->createUser();
    }
        header("Location: ../welcome.php");
    }

}
?>