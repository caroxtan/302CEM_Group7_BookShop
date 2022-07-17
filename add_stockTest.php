<?php

require_once 'C:\xampp\htdocs\BookShopSprint\add_stock.php';
class add_stockTest extends PHPUnit_Framework_TestCase {

    protected $webDriver;
    
     public function testPushAndPop()
    {
       $stack = [];
       $this->assertSame(0, count($stack));

    }

}


