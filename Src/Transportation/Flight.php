<?php

namespace Src\Transportation;

class Flight extends AbstractTransport
{
    const MESSAGE = 'From %s, take flight %s to %s. Gate %s. Seat %s.';
    const MESSAGE_BAGGAGE_DROP = 'Baggage drop at ticket counter %s.';
    const MESSAGE_BAGGAGE_AUTO = 'Baggage will be automatically transferred from your last leg.';
    /**
     * @var string
     */
    protected string $transportNumber;
    /**
     * @var string
     */
    protected string $seat;
    /**
     * @var string
     */
    protected string $gate;
    /**
     * @var string
     */
    protected string $baggage;

    /**
     * Train constructor.
     * @param array $transport
     */
    public function __construct(array $transport)
    {
        parent::__construct($transport);
        $this->transportNumber = $transport['Transportation_number'] ?? '';
        $this->seat = $transport['Seat'] ?? '';
        $this->gate = $transport['Gate'] ?? '';
        $this->baggage = $transport['Baggage'] ?? '';
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(self::MESSAGE,
            $this->departure,
            $this->transportNumber,
            $this->arrival,
            $this->gate,
            $this->seat
        );

        if (!empty($this->baggage)) {
            $message .= sprintf(self::MESSAGE_BAGGAGE_DROP, $this->baggage);
        } else {
            $message .= self::MESSAGE_BAGGAGE_AUTO;
        }

        return $message;
    }
}