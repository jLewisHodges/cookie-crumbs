<?php 
$the_title = 'Cart';
include('header.php');
include_once(__DIR__."/../config.php");
?>
<div class="contentMenu">
    <h3 id="cartTitle"> Your Current Cart </h3>
    <?php echo $cart->getHTML(); ?>
    <div><a href="confirm_account_info.php"><button>Checkout</button></a></div>
    <div id="addMoreToCart"><h4 id="wantAdd">Want to add more to your cart?</h2><a href="menu.php"><img src="images/plus.png" id="addMoreCart"></a></div>
</div>
<?php
include('footer.php');?>