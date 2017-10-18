<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers airportBus
 */
final class airportBusTest extends TestCase
{
    public function testCanBeCreatedFromValidParams(): void
    {
        $this->assertInstanceOf(
            airportBus::class,
            new airportBus("Barcelona", "London")
        );
    }
    
    public function testCannotBeCreatedFromInvalidParams(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new airportBus("", "London");
    }

}
