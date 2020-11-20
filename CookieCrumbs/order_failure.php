<?php 
$the_title = 'Menu Item Confirmation';
include('header.php');?>
    <div class="content">
        <div class="interactive">
        <img src="images/circle-x.png" id="checkmark">
        <h2>Something went wrong with your order.</h2>
        <p></p>
        <p>You will actomatically be redirected back to your cart</p>
</div> 
    </div>
<?php
header("refresh:5;url=view_cart.php");
include('footer.php');?>