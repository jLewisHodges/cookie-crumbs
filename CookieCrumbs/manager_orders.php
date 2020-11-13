<?php
$the_title = 'Order Tracker';
include('header.php');
include_once('config.php');
include_once(SITE_ROOT.'/classes/getAllOrders.php');
$orders = new getAllOrders();
//$orders->execute();

?>
    <!--HTML Code Here-->
    <h2>Orders</h2>    
    <?php echo $orders->getResult();?>
<?php
include('footer.php');?>