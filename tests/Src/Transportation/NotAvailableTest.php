<?php

use PHPUnit\Framework\TestCase;
use Src\Transportation\NotAvailable;

class NotAvailableTest extends TestCase
{
    protected string $finalMessage = 'Travel from A to B. Details not available yet.';

    protected NotAvailable $notAvailable;

    protected array $trip = [
        'Departure' => 'A',
        'Arrival' => 'B',
        'Transportation' => 'Bus',
    ];

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->notAvailable = new NotAvailable($this->trip);
    }

    public function testGetMessage()
    {
        $message = $this->notAvailable->getMessage();
        $this->assertTrue(strlen($message) > 1);
        $this->assertEquals($this->finalMessage, $message);
    }
}