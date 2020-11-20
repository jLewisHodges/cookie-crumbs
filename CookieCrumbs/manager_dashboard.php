<?php 
$the_title = 'Dashboard';
include_once(__DIR__."/config.php");
include_once(SITE_ROOT."/php_scripts/totalSales.php");
include_once('header.php');
$totalSales = new totalSales();
?>
<div style="text-align: center;">
<h2>Current Total Sales is $<?php echo $totalSales->getSales()?></h2>
</div>
<br>
<div class="centered">
    <input type="button" onclick="location.href='manager_ordering.php';" value="Ordering"  class="managerDashButton"/>
</div>
<br>
<div class="centered">
    <input type="button" onclick="location.href='edit_menu.php';" value="Edit Menu"  class="managerDashButton"/>
</div>
<br>
<div class="centered">
    <input type="button" onclick="location.href='manager_orders.php';" value="View Current Orders"  class="managerDashButton"/>
</div>

<?php
include('footer.php');?>