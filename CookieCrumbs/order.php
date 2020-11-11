<?php
    /*
        author: Jorden Hodges
        Description: Gives UI for customers to order 
    */
$the_title = 'Order';
$script = 'order.js';
include('classes/UserAccount.php');
include('header.php');
?>
<div class="content">
    <div id="orderOption">
        <h2>Delivery or Pickup?</h2>
        <img onclick="setDelivery(true)" src = "images/delivery-icon.png" id="delivery">
        <img onclick="setDelivery(false)" src = "images/pickup-icon.png" id="pickup">
    </div>
    <div><button id="delivSubmit" onclick="submitOrder()">Submit</button><div>
</div>
<?php
include('footer.php');?>