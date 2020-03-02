<?php

namespace Src\Contracts;

interface OutputInterface
{
    /**
     * Get output as text
     * @return mixed
     */
    public function getAsText();
}