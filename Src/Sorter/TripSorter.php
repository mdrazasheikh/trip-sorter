<?php

namespace Src\Sorter;

class TripSorter
{
    /**
     * @var array
     */
    protected array $trips;
    /**
     * @var int
     */
    protected int $size;

    /**
     * TripSorter constructor.
     * @param $trips
     */
    public function __construct($trips)
    {
        $this->trips = $trips;
        $this->size = count($trips);
    }

    /**
     * @return $this
     */
    public function sort()
    {
        $this->sortFirstLastItems();
        $this->sortAllTrips();

        return $this;
    }

    /**
     * @return array
     */
    public function getTrips()
    {
        return $this->trips;
    }

    /**
     * Put first and last trips in their respective place
     */
    private function sortFirstLastItems()
    {
        for ($i = 0; $i < $this->size; $i++) {
            $hasPreviousTrip = false;
            $isLastTrip = true;
            foreach ($this->trips as $index => $trip) {
                if (strcasecmp($this->trips[$i]['Departure'], $trip['Arrival']) == 0) {
                    $hasPreviousTrip = true;
                } elseif (strcasecmp($this->trips[$i]['Arrival'], $trip['Departure']) == 0) {
                    $isLastTrip = false;
                }
            }
            if (!$hasPreviousTrip) {
                array_unshift($this->trips, $this->trips[$i]);
                unset($this->trips[$i]);
            } elseif ($isLastTrip) {
                array_push($this->trips, $this->trips[$i]);
                unset($this->trips[$i]);
            }
        }
        // clean up array keys
        $this->trips = array_values($this->trips);
    }

    /**
     * Perform sort on all the trips
     */
    private function sortAllTrips()
    {
        for ($i = 0; $i < $this->size - 1; $i++) {
            foreach ($this->trips as $index => $trip) {
                if (strcasecmp($this->trips[$i]['Arrival'], $trip['Departure']) == 0) {
                    $nextIndex = $i + 1;
                    $tempRow = $this->trips[$nextIndex];
                    $this->trips[$nextIndex] = $trip;
                    $this->trips[$index] = $tempRow;
                    break;
                }
            }
        }
    }
}