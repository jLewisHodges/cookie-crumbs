<?php 
$the_title = 'Order Recieved';
include('header.php');?>
    <div class="content">
        <img src="images/checkmark.png" id="checkmark">
        <h2>Order Successfully Recieved</h2>
        <p>You will actomatically be redirected to your order history page</p>
    </div>
<?php
header("refresh:5;url=view_orders.php");
include('footer.php');?>