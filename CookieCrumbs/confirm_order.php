<?php
$the_title = 'Confirm Order';
include('header.php');
include_once(__DIR__."/config.php");
if($_GET["isDelivery"] == "true")
    $orderType="Delivery Order";
else
    $orderType="Pickup Order";

$tableNumber = $_GET["tableNum"];
?>
<div class="contentMenu">
    <h3 id="cartTitle"> Confirm Your Order </h3>
    <?php echo $cart->getConfHTML(); ?>
    <div class="content">
    <h3 style="text-align:center">Your Information</h3>
    <?php
    include_once('config.php');
    include_once(SITE_ROOT."/includes/connection.php");
    echo 
    '
    <form id="cAccountForm">
    <fieldset disabled="disabled">
    <input type = "text"  value = "'.$currentAccount->getFirstName().'" id="fname" name = "fname" required>
    <input type = "text" value = "'.$currentAccount->getLastName().'" id="lname" name = "lname" required>
<div id="emailAddress">
    <input type = "text" value = "'.$currentAccount->getEmail().'" id="email" name = "eaddr" required>
    <div id="emailCheck"></div>
</div>
    <input type = "text" name = "address" id="address" value="'.$currentAccount->getAddress().'" required>
    <input type = "text" name = "apt" id="apt" value="'.$currentAccount->getApt().'">
    <input type = "text" name = "city" id="city" value="'.$currentAccount->getCity().'" required>
    <input type = "text" name = "state" id="state" value="'.$currentAccount->getState().'" required>
    <input type = "text" name = "zip" id="zip" value="'.$currentAccount->getZip().'" required>
    <input type = "text" name = "isDelivery" id="isDelivery" value="'.$orderType.'">';
    if($_GET['isDelivery'] == 'false'){echo '<input type = "text" name = "tableNumber" id="tableNumField" value="Table #'.$tableNumber.'">';}
    else {echo '<input type = "hidden" name = "tableNumber" id="tableNumField" value="Table #'.$tableNumber.'">';}
    echo '</fieldset>
</form>
<a href="php_scripts/addOrder.php?isDelivery='.$_GET['isDelivery']."&tableNum=".$_GET['tableNum'].'"><button>Submit</button></a>';
    ?>
</div>
</div>