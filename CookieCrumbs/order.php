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
    <form class="orderForm" action="">
    <div class="tab">
        <h2>Delivery or Pickup?</h2>
        <input type="image" src = "images/delivery-icon.png" class="delivery" oninput="this.className = ''">
        <input type="image" src = "images/pickup-icon.png" class="pickup" oninput="this.className = ''">
    </div>
    <h6>First Name</h6>
</div>
<?php
include('footer.php');?>