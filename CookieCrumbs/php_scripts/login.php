<?php
/*
    addUser 
*/
/*$sql = "SELECT * FROM users WHERE email_address='?'";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($stmt = $conn->prepare($sql))
    {
        $stmt->bind_param("s", $email);
        $email = $_REQUEST["eaddr"];
        echo $email;
        $password = $_REQUEST["password"];
        echo $password;
        if($stmt->execute())
        {
            if(!$result = $stmt->get_result())
            {
                echo "fail";
            }
            if(!$accountInfo = $result->fetch_all(MYSQLI_ASSOC))
            {
                echo "could not make associative array";
            }
            echo $accountInfo['email_address'];
            echo $accountInfo['password'];
            echo "Account found succesfully";
        }
        else
        {
            echo "ERROR: Could not execute query: $sql. ";
        }
    }
    else
    {
        echo "could not make account\n";
        echo mysqli_error($conn);
    }
}*/
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once('../includes/connection.php');
include_once('../classes/UserAccount.php');
include_once('../classes/Cart.php');
    $login = new login();
    $login->execute();

class login
{
    private $email;
    private $password;
    private $hashed_password;
    private $db;
    private $conn;

    public function __construct()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $this->email = $_REQUEST["eaddr"];
            $this->email = htmlspecialchars($this->email);
            $this->password = $_REQUEST["password"];
            $this->password = htmlspecialchars($this->password);
            $this->db = new Connection();
        }
    }

    public function constructer($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->execute();
    }
    
    public function execute()
    {
        $this->findAccount();
    }

    private function findAccount()
    {
        $accountInfo = $this->db->getUserInfoByEmail($this->email);
        $addressInfo = $this->db->getAddressByID($accountInfo['user_id']);
        // Associative array
        $isValid = $this->validateAccount($accountInfo);
        if($isValid)
            echo "Password Incorrect";
        else
            $this->createSession($accountInfo, $addressInfo);
    }

    private function validateAccount($accountInfo){
        return password_verify($this->password, $accountInfo['email_address']);
    }

    private function createSession($accountInfo, $addressInfo)
    {
        session_start();
        $userAccount = new UserAccount($accountInfo['user_id'], $accountInfo['first_name'], $accountInfo['last_name'], $accountInfo['email_address'], $accountInfo['isEmployee'], $accountInfo['isManager'], $addressInfo['street_address'], $addressInfo['street_address_2'], $addressInfo['city'], $addressInfo['state'], $addressInfo['zip']);
        $_SESSION['currentAccount'] = serialize($userAccount);
        $_SESSION['cart'] = serialize(new Cart());
        header('location:../welcome.php');
    }
}

?>