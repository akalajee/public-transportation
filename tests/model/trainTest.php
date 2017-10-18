<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers train
 */
final class trainTest extends TestCase
{
    public function testCanBeCreatedFromValidParams(): void
    {
        $this->assertInstanceOf(
            train::class,
            new train("Barcelona", "London", "334", "11-A")
        );
    }
    
    public function testCannotBeCreatedFromInvalidParams(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new train("Sudan", "London", "334", "");
    }

}

