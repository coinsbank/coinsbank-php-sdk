<?php

namespace Coinsbank\Transport;

/**
 * Class Response
 *
 * @package Coinsbank\Transport
 */
class CoinsbankResponse
{
    /**
     * @var string The response body.
     */
    protected $body;

    /**
     * @var array The response headers.
     */
    protected $headers;

    /**
     * @var int The HTTP status response code.
     */
    protected $httpResponseCode;

    /**
     * Response constructor.
     *
     * @param array $headers
     * @param string $body
     * @param int|null $httpResponseCode
     */
    public function __construct($headers, $body, $httpResponseCode = null)
    {
        $this->httpResponseCode = (int)$httpResponseCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * Returns the body of the response.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns the JSON-decoded body
     *
     * @return array
     */
    public function getBodyDecoded()
    {
        return json_decode($this->body, true);
    }

    /**
     * Returns the response headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Returns the HTTP response code.
     *
     * @return int
     */
    public function getHttpResponseCode()
    {
        return $this->httpResponseCode;
    }
}