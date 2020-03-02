<?php

namespace Src\Output;

use Src\Contracts\OutputInterface;
use Src\Transportation\Bus;
use Src\Transportation\Flight;
use Src\Transportation\NotAvailable;
use Src\Transportation\Train;

class TripOutput implements OutputInterface
{
    /**
     * @var array
     */
    protected array $trips;

    /**
     * TripOutput constructor.
     * @param array $trips
     */
    public function __construct(array $trips)
    {
        $this->trips = $trips;
    }

    /**
     * Get trip output as text
     * @return string
     */
    public function getAsText()
    {
        $output = '';
        foreach ($this->trips as $trip) {
            switch ($trip['Transportation']) {
                case 'Train' :
                    $transport = new Train($trip);
                    break;
                case 'Bus' :
                    $transport = new Bus($trip);
                    break;
                case 'Plane':
                    $transport = new Flight($trip);
                    break;
                default:
                    $transport = new NotAvailable($trip);
            }
            $output .= $transport->getMessage() . PHP_EOL;
        }

        return $output;
    }

}