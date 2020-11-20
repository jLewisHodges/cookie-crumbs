<?php
/*
totalSales - sums all sales in the database and returns the value 

returns the value if total > 0
else returns -1
*/
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/includes/connection.php");
class totalSales
{
    public $sales;
    public function __construct()
    {
        $this->getTotalSales();
    }
    public function getTotalSales()
    {
        $db = new Connection();
        $sql = "SELECT SUM(sale_amount) total FROM placed_orders";
        
        $result = $db->conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['total'] > 0){
            $this->sales = $row['total'];
        }
        else{
            return -1;
        }
        
        
        $db->conn->close();
    }

    public function getSales(){
        return $this->sales;
    }

}
