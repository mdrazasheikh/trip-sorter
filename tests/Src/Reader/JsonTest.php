<?php

use PHPUnit\Framework\TestCase;
use Src\Reader\Json;

class JsonTest extends TestCase
{
    protected string $jsonFilePath;
    protected Json $reader;
    protected string $jsonString = '[{
            "Departure": "Barcelona",
            "Arrival": "Gerona Airport",
            "Transportation": "Bus"
        },
        {
            "Departure": "Stockholm",
            "Arrival": "New York",
            "Transportation": "Plane",
            "Transportation_number": "SK22",
            "Seat": "7B",
            "Gate": "22"
        }]';

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->reader = new Json();
        $this->jsonFilePath = getcwd() . '/DataSource/testSource.json';
    }

    public function testFromFileAsArray()
    {
        $out = $this->reader->fromFileAsArray($this->jsonFilePath);
        $this->assertIsArray($out);
    }

    public function testFromFileAsObject()
    {
        $out = $this->reader->fromFileAsObject($this->jsonFilePath);
        $this->assertIsArray($out);
        $this->assertIsObject($out[0]);
    }

    public function testFromRequestAsArray()
    {
        $out = $this->reader->fromRequestAsArray($this->jsonString);
        $this->assertIsArray($out);
    }

    public function testFromRequestAsObject()
    {
        $out = $this->reader->fromRequestAsObject($this->jsonString);
        $this->assertIsArray($out);
        $this->assertIsObject($out[0]);
    }
}