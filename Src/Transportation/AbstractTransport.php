<?php

namespace Src\Transportation;

use Src\Contracts\TransportInterface;

abstract class AbstractTransport implements TransportInterface
{
    /**
     * @var string
     */
    protected string $departure;
    /**
     * @var string
     */
    protected string $arrival;

    /**
     * AbstractTransport constructor.
     * @param array $transport
     */
    public function __construct(array $transport)
    {
        $this->departure = $transport['Departure'] ?? '';
        $this->arrival = $transport['Arrival'] ?? '';
    }
}