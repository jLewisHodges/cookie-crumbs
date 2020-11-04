<?php 
$the_title = 'Log In';
include('header.php');?>
<div class="content">
    <h4>Log In to your Cookie Crumbs Account</h3>
    <form id="loginForm" method="post" action="php_scripts/login.php">
        <input type = "text" id="logEaddr" placeholder="Email Address" name = "eaddr" required>
        <input type = "text" id="logPass" placeholder="Password" name = "password" required>
        <input type = "submit" id="logSubmit">
    </form>
</div>
<?php
include('footer.php');?>