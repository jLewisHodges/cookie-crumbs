<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$the_title = 'Create New Account';
include('header.php');
?>

    <form method="post" action="php_scripts/addUser.php">
        <label for="fname">First Name:</label>
        <input type = "text" name = "fname" required>
        <label for="lname">Last Name:</label>
        <input type = "text" name = "lname" required>
        <label for="eaddr">Email Address:</label>
        <input type = "text" name = "eaddr" required>
        <label for="password">Password:</label>
        <input type = "text" name = "password" required>
        <label for="confPassword">Confirm Password:</label>
        <input type = "text" name = "confPassword" required>
        <input type = "submit">
    </form>

<?php
include('footer.php');
mysqli_close($conn);
?>