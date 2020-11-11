<?php 
$the_title = 'Confirm Your Information';
include('header.php');
?>
<div class="content">
<div class="contentMenu">
    <h3 style="text-align:center">Please Confirm Your Information</h3>
    <br></br>
    <?php
    include_once('config.php');
    include_once(SITE_ROOT."/includes/connection.php");
    echo 
    '<form id="cAccountForm">
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
    </fieldset>
</form>';
    ?>
    <a href=""><button>Edit</button></a>
    <a href="order.php"><button>Confirm</button></a>
</div>
</div>
<?php
include('footer.php');
?>