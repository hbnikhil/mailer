<?php

require "Money.php";

class MoneyTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function testCanBeNegated()
    {
        // Arrange
        $a = new Money(2);

        // Act
        $b = $a->negate();

        // Assert
        $this->assertEquals(-2, $b->getAmount());
    }
    
    public function testFailure()
    {
        $this->assertContains(4, array(1, 2, 3, 4));
    }

    // ...
}
