<?php
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
    include_once('header.php');
    include_once('classes/OrderFinder.php');

    $finder = new OrderFinder();
    $orders = $finder->findAllOrdersByUserId($currentAccount->getUserId());
    foreach($orders as $order)
    {
        echo $order->__toString();
    }
?>