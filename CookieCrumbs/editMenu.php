<?php 
$the_title = 'menu';
include('header.php');?>
<div id = "menu"></div>
<script>
    function reqListener(){
        console.log(this.responseText)
    }

    var oReq = new XMLHttpRequest();
    oReq.onload = function(){
        document.getElementById("menu").innerHTML = this.responseText;
    };
    oReq.open("get","php_scripts/getMenu.php", true);

    oReq.send();
</script>
<?php
include('footer.php');?>