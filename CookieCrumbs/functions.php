<?php
    include('includes/main_functions.php');

    function main_nav()
    {
        global $dtm;

        $class = "container nav";

        /*$links_array = array(
            array('text' => 'Home', 'url' => 'index.php'),
            array('text' => 'Order Status', 'url' => 'order_status.php'),
            array('text' => 'Education Center', 'url' => 'education.php')
        );
        
        return $dtm->navigation($links_array, $class);*/

        $images_array = array(
            array('src' => 'images/profile-pic.png', 'url'=>'customer_dashboard.php'),
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