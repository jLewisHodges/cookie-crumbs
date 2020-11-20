<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Edit Menu';
$script='menu.js';
include_once('classes/MenuServices.php');
include('header.php');
$menuServices = new MenuServices();
$menuServices->execute();
?>
<div class="contentMenu">
    <?php echo ($menuServices->getEditResult());?>
    <a href="create_menu_item.php" class="centered"><img src="images/plus.png" id ="addMenuItem"></a>
</div>
<div style="height: 25px;"></div>
<?php
include('footer.php');?>