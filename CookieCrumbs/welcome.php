<?php 
session_start();
include_once('includes/connection.php');
require_once('classes/UserAccount.php');
$the_title = 'Log In';
include('header.php');
echo "Welcome to Cookie Crumbs ";
$currentAccount = unserialize($_SESSION['currentAccount']);
$currentAccount->__toString();
echo "!";
?>
<?php
include('footer.php');?>