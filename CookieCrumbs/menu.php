<?php 
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