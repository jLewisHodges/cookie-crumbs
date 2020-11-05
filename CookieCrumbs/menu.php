<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Menu';
$script='menu.js';
include_once("config.php");
include_once(SITE_ROOT. "/classes/MenuServices.php");
include('header.php');
$menuServices = new MenuServices();
$menuServices->execute();
?>
<div class="contentMenu">
    <?php echo ($menuServices->getResult());?>
</div>
<?php
include('footer.php');?>