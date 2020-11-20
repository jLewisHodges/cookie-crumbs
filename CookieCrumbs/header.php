<!DOCTYPE html>
<?php 
session_start();
include_once("config.php");
include_once(SITE_ROOT."/classes/UserAccount.php");
include_once(SITE_ROOT."/classes/Cart.php");
if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
    $cart = unserialize($_SESSION['cart']);
if(isset($_SESSION['currentAccount']) && !empty($_SESSION['currentAccount']))
    $currentAccount = unserialize($_SESSION['currentAccount']);
else{
    if(basename($_SERVER['PHP_SELF']) == 'create_account.php' || basename($_SERVER['PHP_SELF']) == 'login_page.php' || basename($_SERVER['PHP_SELF']) == 'logout_page.php')
    {

    }
    else
        header("location: login_page.php");
}
include('functions.php'); 
?>
<html>
    <head>
        <title>
            <?php echo get_html_title($the_title); ?>
        </title>
        <meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <script src = "<?php echo get_javascript($script); ?>"></script>
		
		<link rel="stylesheet" href="styles/style.css">
		<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    </head>

    <body>
        <div id = "wrap">
            <div id = "nav">
                <?php echo main_nav(); ?>
            </div>