<?php
/*
    addUser 
*/
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once('../includes/connection.php');
include_once('../classes/UserAccount.php');
include_once('../classes/Cart.php');
include_once('../classes/AccountInfo.php');
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
        $accountInformation = new AccountInfo('<form id="cAccountForm">
        <fieldset disabled="disabled">
        <input type = "text"  value = "'.$userAccount->getFirstName().'" id="fname" name = "fname" required>
        <input type = "text" value = "'.$userAccount->getLastName().'" id="lname" name = "lname" required>
        <div id="emailAddress">
        <input type = "text" value = "'.$userAccount->getEmail().'" id="email" name = "eaddr" required>
        <div id="emailCheck"></div>
        </div>
        <input type = "text" name = "address" id="address" value="'.$userAccount->getAddress().'" required>
        <input type = "text" name = "apt" id="apt" value="'.$userAccount->getApt().'">
        <input type = "text" name = "city" id="city" value="'.$userAccount->getCity().'" required>
        <input type = "text" name = "state" id="state" value="'.$userAccount->getState().'" required>
        <input type = "text" name = "zip" id="zip" value="'.$userAccount->getZip().'" required>
        </fieldset>
        </form>');
        $_SESSION['accountInformation'] = serialize($accountInformation);
     
        if($accountInfo['isManager'] == 1){
            header('location:../manager_dashboard.php');
        }
        else{
            header('location:../customer_dashboard.php');
        }
    }
}

?>