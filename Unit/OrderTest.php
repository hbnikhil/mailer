<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
require "Order.php";

class OrderTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function testCanBeOrderMail($data)
    {
		$this->assertNotEmpty($data);
		
		$this->assertNotEmpty($data);
		// Arrange
        $a = new Order($data);
        
        $count = $this->assertCount(1, array($data));
        
        $mail = $a->sendSwiftMailer($data);
        
        $this->assertEquals(1, $mail);
        
        if($mail == 1) {
			$this->assertTrue(TRUE);
		} else {
			$this->assertFalse(TRUE);
		}
        return $mail;
    }
    // ...
}
