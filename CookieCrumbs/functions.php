<?php
    include('includes/main_functions.php');

    function main_nav()
    {
        global $dtm;

        $class = "container nav";

        $currentAccount = unserialize($_SESSION['currentAccount']);
    
        if($currentAccount == null)
            $personIconDest = 'login_page.php';
        else
            $personIconDest = 'customer_dashboard.php';
        $images_array = array(
            array('src' => 'images/profile-pic.png', 'url'=>$personIconDest),
            array('src' => 'images/cart.png', 'url'=>'view_cart.php')
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