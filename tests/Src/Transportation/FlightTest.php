<?php

use PHPUnit\Framework\TestCase;
use Src\Transportation\Flight;

class FlightTest extends TestCase
{
    protected Flight $flight;

    protected array $trip = [
        'Departure' => 'A',
        'Arrival' => 'B',
        'Transportation' => 'Plane',
        'Transportation_number' => '10A',
        'Seat' => '11A',
        'Gate' => '12A',
    ];

    protected string $finalMessage = 'From A, take flight 10A to B. Gate 12A. Seat 11A.Baggage will be automatically transferred from your last leg.';

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->flight = new Flight($this->trip);
    }

    public function testGetMessage()
    {
        $message = $this->flight->getMessage();
        $this->assertTrue(strlen($message) > 1);
        $this->assertEquals($this->finalMessage, $message);
    }
}