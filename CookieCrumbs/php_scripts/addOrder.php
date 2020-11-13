<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once("../includes/connection.php");
include_once("../classes/UserAccount.php");
include_once("../classes/Cart.php");
include_once("../classes/CartItem.php");
include_once("../classes/MenuItem.php");
$addOrder = new addOrder();
if(empty(unserialize($_SESSION['cart'])->getItemList()))
    header('location:../order_failure.php');
else
    $addOrder->execute();
    class addOrder
    {
        public $currentAccount;
        public $cart;
        private $db;
        function __construct()
        {
            $this->currentAccount = unserialize($_SESSION['currentAccount']);
            $this->cart = unserialize($_SESSION['cart']);
            $this->db = new Connection();
        }

        private function confirmationPage()
        {
            header('location: ../order_recieved.php');
        }

        private function clearCart()
        {
            $_SESSION['cart'] = serialize(new Cart());
        }

        private function addToDb()
        {
            $sql = "INSERT INTO placed_orders (user_id, date_time, table_number, isDelivery, isPaid, ETA, sales_credit, sale_amount) VALUES (?, now(), ?, ?, ?, ?, ?, ?)";
            if($stmt = mysqli_prepare($this->db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "iiiiiid", $userId, $tableNum, $isDelivery, $isPaid, $ETA, $sales_credit, $total);
                $tableNum = 0;
                $isPaid = 0;
                $ETA = $this->cart->getMakeTime();
                $sales_credit = 0;
                $userId = $this->currentAccount->getUserId();
                $total = $this->cart->getTotal();
                if($_GET["isDelivery"])
                    $isDelivery=1;
                else
                    $isDelivery=0;
                if(mysqli_stmt_execute($stmt))
                {
                    echo "Account added succesfully";
                }
                else
                {
                    header('location:../order_failure.php');
                }
            }
            else
            {
                header('location:../order_failure.php');
                echo mysqli_error($this->db->conn);
            }
            mysqli_stmt_close($stmt);
        }

        private function addItemsToDb()
        {
            $idQuery = $this->db->conn->query("SELECT order_id FROM placed_orders WHERE user_id = '".$this->currentAccount->getUserId()."' ORDER BY date_time DESC");
            $idArr = $idQuery->fetch_assoc();
            $id= $idArr['order_id'];
            $sql = "INSERT INTO order_items (order_id, item_id, quantity) VALUES (?, ?, ?)";
            if($stmt = mysqli_prepare($this->db->conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "iii", $orderId, $itemId, $quantity);
                $orderId = $id;
                $itemList = $this->cart->getItemList();
                foreach($itemList as $item)
                {
                    $itemId = $item->getMenuItem()->getItem_id();
                    $quantity = $item->getQuantity();
                    if(mysqli_stmt_execute($stmt))
                    {
                        echo "Item added succesfully";
                    }
                    else
                    {
                        header('location:../order_failure.php');
                    }
                }
            }
            else
            {
                header('location:../order_failure.php');
            }
            mysqli_stmt_close($stmt);
        }
        public function execute()
        {
            $this->addToDb();
            $this->addItemsToDb();
            $this->clearCart();
            $this->confirmationPage();
        }
    }
?>  