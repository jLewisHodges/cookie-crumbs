<?php 
$the_title = 'Dashboard';
$script = 'customer_dashboard.js';
include('header.php');
include_once('classes/OrderFinder.php');
include_once('classes/OrderTicket.php');
$orderFinder = new OrderFinder
?>
    <div class="content">
    <a href="menu.php"><div id="menuLink">
        <h1>The Menu</h1>
    </div></a>
    <div class="contentMenu">
        <h3>Your Last Order</h3>
        <?php 
            $orders=$orderFinder->findAllOrdersByUserId($currentAccount->getUserId());
            $order = array_pop(array_reverse($orders));
            echo $order->getSummaryHTML();
        ?>
    <div class="flex-container">
        <a class="flex-child link1" href="view_orders.php"><button>View Your Orders</button></a>
        <div class="flex-child link2">
            <button id="singleOrderButton" onclick="addInput()">View a single order</button>
            <div id="orderInput"></div>
        </div>
    </div>
    <a href="php_scripts/logout.php"><h3>Log out of account.</h3></a>
    </div>
    </div>
<?php
include('footer.php');?>