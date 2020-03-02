<?php

use PHPUnit\Framework\TestCase;
use Src\Sorter\TripSorter;

class TripSorterTest extends TestCase
{
    protected array $initialTripCollection = [
        [
            'Departure' => 'C',
            'Arrival' => 'D',
            'Transportation' => 'Bus',
        ],
        [
            'Departure' => 'D',
            'Arrival' => 'E',
            'Transportation' => 'Bus',
        ],
        [
            'Departure' => 'A',
            'Arrival' => 'B',
            'Transportation' => 'Plane',
            'Transportation_number' => '10A',
            'Seat' => '11A',
            'Gate' => '12A',
        ],
        [
            'Departure' => 'B',
            'Arrival' => 'C',
            'Transportation' => 'Plane',
            'Transportation_number' => '10A',
            'Seat' => '11A',
            'Gate' => '12A',
        ]
    ];

    protected array $finalTripCollection = [
        [
            'Departure' => 'A',
            'Arrival' => 'B',
            'Transportation' => 'Plane',
            'Transportation_number' => '10A',
            'Seat' => '11A',
            'Gate' => '12A',
        ],
        [
            'Departure' => 'B',
            'Arrival' => 'C',
            'Transportation' => 'Plane',
            'Transportation_number' => '10A',
            'Seat' => '11A',
            'Gate' => '12A',
        ],
        [
            'Departure' => 'C',
            'Arrival' => 'D',
            'Transportation' => 'Bus',
        ],
        [
            'Departure' => 'D',
            'Arrival' => 'E',
            'Transportation' => 'Bus',
        ]
    ];

    protected TripSorter $tripSorter;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->tripSorter = new TripSorter($this->initialTripCollection);
    }

    public function testSort()
    {
        $out = $this->tripSorter->sort()->getTrips();
        $this->assertEquals($this->finalTripCollection, $out);
    }
}