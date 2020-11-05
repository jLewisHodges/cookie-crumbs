<?php

namespace WaiterDashBoardServices;
/*
Author: Nick Cody
Description: this file contains all of the classes relevant to the waiter dashboard
*/ 
class MenuItem
{

}
abstract class OrderCommand 
{
    public $receiver;
    public $orderItem;
    public function __construct($orderTicket, $orderItem)
    {
        $this->receiver = $orderTicket;
        $this->orderItem = $orderItem;
    }
    abstract public function execute()
    {
        $receiver->AddItem($orderItem);
    }
}


class OrderItemInvoker
{
    private $menuItem;
    private $addItemCommand;

    function __construct($menuItem)
    {
        $this->menuItem=$menuItem;
    }
}

class AddItemCommand extends OrderCommand {

}

class OrderTicket {
    private $items = array();
    private $cost;

    public function __construct()
    {
    }
}

?>