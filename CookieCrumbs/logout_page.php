<?php 
$the_title = 'logout';
include('header.php');?>
    <div class="content">
        <div class="interactive">
        <img src="images/checkmark.png" id="checkmark">
        <h2>Logged Out successfully!</h2>
        <p></p>
        <p>You will actomatically be redirected to the login page</p>
</div> 
    </div>
<?php
header("refresh:5;url=login_page.php");
include('footer.php');?>