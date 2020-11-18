<?php
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
    $the_title = 'View Orders';
    include('header.php');
    include_once("config.php");
    include_once('classes/OrderFinder.php');
    include_once('classes/Orders.php');
    include_once('classes/OrderTicket.php');

    $finder = new OrderFinder();
    $order=$finder->getByOrderNumber($_GET['orderNum']);
    ?>
    <div class="content">
    <div class="contentMenu">
        <h3 id="title">Order Summary for Order Number <?php echo $order->__get("orderNum");?></h3>
        <?php echo $order->getFullHTML(); ?>
    </div>
</div>
    <?php
    include('footer.php');
?>