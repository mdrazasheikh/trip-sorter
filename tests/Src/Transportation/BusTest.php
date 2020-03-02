<?php

use PHPUnit\Framework\TestCase;
use Src\Transportation\Bus;

class BusTest extends TestCase
{
    protected Bus $bus;

    protected array $trip = [
        'Departure' => 'A',
        'Arrival' => 'B',
        'Transportation' => 'Bus',
    ];

    protected string $finalMessage = 'Take the airport bus from A to B.No seat assignment.';

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->bus = new Bus($this->trip);
    }

    public function testGetMessage()
    {
        $message = $this->bus->getMessage();
        $this->assertTrue(strlen($message) > 1);
        $this->assertEquals($this->finalMessage, $message);
    }
}