<?php

namespace Src\Contracts;

interface ReaderInterface
{
    /**
     * @param string $filePath
     * @return mixed
     */
    public function fromFileAsArray(string $filePath);

    /**
     * @param string $filePath
     * @return mixed
     */
    public function fromFileAsObject(string $filePath);

    /**
     * @param string $request
     * @return mixed
     */
    public function fromRequestAsArray(string $request);

    /**
     * @param string $request
     * @return mixed
     */
    public function fromRequestAsObject(string $request);
}