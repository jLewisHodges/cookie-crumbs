<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once(__DIR__."/../config.php");
include_once(SITE_ROOT."/classes/Cart.php");
include_once(SITE_ROOT. "/classes/MenuServices.php");
$cart = unserialize($_SESSION['cart']);
$removeFromCart = new removeFromCart();
$cart = $removeFromCart->remove_item($cart);
$_SESSION['cart'] = serialize($cart);
header("location: ../view_cart.php");

    class removeFromCart
    {
        private $menuServices;
        function __construct()
        {
            $this->menuServices = new MenuServices();
            $this->menuServices->execute();
        }

        public function remove_item($cart)
        {
            $item=$this->menuServices->getMenuItemById($_GET["id"]);
            $cart->removeItem($item);
            return $cart;
        }
    }
?>