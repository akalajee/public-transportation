<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers flight
 */
final class flightTest extends TestCase
{
    public function testCanBeCreatedFromValidParams(): void
    {
        $this->assertInstanceOf(
            flight::class,
            new flight("Barcelona", "London", "222", "1", "12", "")
        );
    }
    
    public function testCannotBeCreatedFromInvalidParams(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new flight("", "London", "222", "1", "12", "");
    }

}
