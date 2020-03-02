<?php

namespace Src\Transportation;

class NotAvailable extends AbstractTransport
{
    const MESSAGE = 'Travel from %s to %s. Details not available yet.';

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        return sprintf(self::MESSAGE, $this->departure, $this->arrival);
    }
}