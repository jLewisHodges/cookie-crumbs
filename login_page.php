<?php 
include_once('includes/connection.php');
$the_title = 'Log In';
include('header.php');?>
    <form method="post" action="php_scripts/login.php">
        <label for="eaddr">Email Address:</label>
        <input type = "text" name = "eaddr" required>
        <label for="password">Password:</label>
        <input type = "text" name = "password" required>
        <input type = "submit">
    </form>
<?php
include('footer.php');?>