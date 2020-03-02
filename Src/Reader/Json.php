<?php


namespace src\reader;

use JsonSchema\Exception\RuntimeException;
use Src\Contracts\ReaderInterface;
use Src\Exceptions\InvalidDataException;

class Json implements ReaderInterface
{
    /**
     * Read from file as an array
     * @param string $filePath
     * @return mixed
     */
    public function fromFileAsArray(string $filePath)
    {
        $fileContent = $this->readFromFile($filePath);
        try {
            $decodedContent = $this->decodeString($fileContent, true);
        } catch (InvalidDataException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $decodedContent;
    }

    /**
     * Read from file as an object
     * @param string $filePath
     * @return mixed
     */
    public function fromFileAsObject(string $filePath)
    {
        $fileContent = $this->readFromFile($filePath);
        try {
            $decodedContent = $this->decodeString($fileContent, false);
        } catch (InvalidDataException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $decodedContent;
    }

    /**
     * Read from request as an array
     * @param string $request
     * @return mixed
     */
    public function fromRequestAsArray(string $request)
    {
        try {
            $decodedContent = $this->decodeString($request, true);
        } catch (InvalidDataException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $decodedContent;
    }

    /**
     * Read from request as an object
     * @param string $request
     * @return mixed
     */
    public function fromRequestAsObject(string $request)
    {
        try {
            $decodedContent = $this->decodeString($request, false);
        } catch (InvalidDataException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $decodedContent;
    }

    /**
     * Read contents from file
     *
     * @param string $filePath
     * @return false|string
     */
    private function readFromFile(string $filePath)
    {
        return file_get_contents($filePath);
    }

    /**
     * Decode the JSON string
     * Throw exception if data is invalid
     *
     * @param string $string
     * @param bool $asArray
     * @return mixed
     * @throws InvalidDataException
     */
    private function decodeString(string $string, bool $asArray)
    {
        $decodedString = json_decode($string, $asArray);

        switch ($errorCode = json_last_error()) {
            case JSON_ERROR_NONE:
                break;
            default:
                throw new InvalidDataException("The request format is invalid.Json decode error code:" . $errorCode);
        }

        return $decodedString;
    }
}