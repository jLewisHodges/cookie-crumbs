<?php
$the_title = 'Order Tracker';
include('header.php');
include_once('config.php');
include_once(SITE_ROOT.'/classes/getAllOrders.php');
$orders = new getAllOrders();
//header('refresh:30');

?>
<!--HTML Code Here-->
<script>
    function executeQuery() {
        $.ajax({
            url: 'classes/getOrderAJAX.php',
            success: function(data) {
             // do something with the return value here if you like
             document.getElementById("orders").innerHTML = data;
            }
        });
        setTimeout(executeQuery, 20000); // you could choose not to continue on failure...
    }

    $(document).ready(function() {
        executeQuery();
        setTimeout(executeQuery, 20000);
    });
</script>
<h2>Orders</h2>
<div id="orders">

</div>
<?php
include('footer.php');?>