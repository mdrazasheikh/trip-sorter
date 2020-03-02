<?php

use PHPUnit\Framework\TestCase;
use Src\Transportation\Train;

class TrainTest extends TestCase
{

    protected string $finalMessage = 'Take train 10A from A to B.Sit in seat 11A';

    protected array $trip = [
        'Departure' => 'A',
        'Arrival' => 'B',
        'Transportation' => 'Train',
        'Transportation_number' => '10A',
        'Seat' => '11A'
    ];

    protected Train $train;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->train = new Train($this->trip);
    }

    public function testGetMessage()
    {
        $message = $this->train->getMessage();
        $this->assertTrue(strlen($message) > 1);
        $this->assertEquals($this->finalMessage, $message);
    }
}