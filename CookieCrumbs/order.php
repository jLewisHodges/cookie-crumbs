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
        <div id="deliveryDiv"><img onclick="setDelivery(true)" src = "images/delivery-icon.png" id="delivery"></img></div>
        <div id="pickupDiv"><img onclick="setDelivery(false)" src = "images/pickup-icon.png" id="pickup"></img></div>
    </div>
    <div id="tableNumDiv"></div>
    <div><button type="submit" id="delivSubmit" onclick="submitOrder()">Submit</button><div>
</div>
<?php
include('footer.php');?>