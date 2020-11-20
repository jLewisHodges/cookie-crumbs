<?php
    include('includes/main_functions.php');

    function main_nav()
    {
        global $dtm;

        $class = "container nav";

        $currentAccount = unserialize($_SESSION['currentAccount']);
    
        if($currentAccount == null)
            $personIconDest = 'login_page.php';
        else if($currentAccount->isManager() == 1)
            $personIconDest = 'manager_dashboard.php';
        else
            $personIconDest = 'customer_dashboard.php';

        if($currentAccount == null)
            $cartIconDest = 'login_page.php';
        else if($currentAccount->isManager() == 1)
            $cartIconDest = 'manager_cart.php';
        else
            $cartIconDest = 'view_cart.php';

        $images_array = array(
            array('src' => 'images/profile-pic.png', 'url'=>$personIconDest),
            array('src' => 'images/cart.png', 'url'=>$cartIconDest)
        );
        return $dtm->navigation($images_array, $class);
    }

    function get_html_title($page_title)
    {
        $title = $page_title.' | Cookie Crumbs';

        return $title;
    }

    function get_javascript($script)
    {
        $javascript = 'scripts/'.$script;

        return $javascript;
    }

?>