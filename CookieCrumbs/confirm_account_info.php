<?php 
$the_title = 'Confirm Your Information';
include('header.php');
if(empty($cart->getItemList()))
    header("location: view_cart.php");
    include_once('config.php');
    include_once(SITE_ROOT."/includes/connection.php");
    include_once(SITE_ROOT."/classes/AccountInfo.php");
    $accountInformation = unserialize($_SESSION['accountInformation']);
?>
<div class="content">
<div class="contentMenu">
    <h3 style="text-align:center">Please Confirm Your Information</h3>
    <br></br>
    <?php
    echo $accountInformation->getHTML();
    ?>
    <a href=""><button>Edit</button></a>
    <a href="order.php"><button>Confirm</button></a>
</div>
</div>
<?php
include('footer.php');
?>