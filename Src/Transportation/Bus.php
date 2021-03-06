<?php

namespace Src\Transportation;

class Bus extends AbstractTransport
{

    const MESSAGE = 'Take the %s bus from %s to %s.';
    const MESSAGE_SEAT_INFO = 'Sit in seat %s';
    const MESSAGE_NO_SEAT = 'No seat assignment.';

    /**
     * @var string
     */
    protected string $transportNumber;
    /**
     * @var string
     */
    protected string $seat;

    /**
     * Train constructor.
     * @param array $transport
     */
    public function __construct(array $transport)
    {
        parent::__construct($transport);
        $this->transportNumber = $transport['Transportation_number'] ?? '';
        $this->seat = $transport['Seat'] ?? '';
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(self::MESSAGE,
            !empty($this->transportNumber) ? $this->transportNumber : 'airport',
            $this->departure,
            $this->arrival
        );

        if (!empty($this->seat)) {
            $message .= sprintf(self::MESSAGE_SEAT_INFO, $this->seat);
        } else {
            $message .= self::MESSAGE_NO_SEAT;
        }

        return $message;
    }
}