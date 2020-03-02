<?php

namespace Src\Contracts;

interface TransportInterface
{
    /**
     * @return mixed
     */
    public function getMessage();
}