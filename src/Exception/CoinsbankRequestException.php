<?php

namespace Coinsbank\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Class CoinsbankRequestException
 *
 * @package Coinsbank\Exception
 */
class CoinsbankRequestException extends \Exception
{
    /** @var ResponseInterface */
    protected $response;

    /**
     * CoinsbankRequestException constructor.
     *
     * @param string $uri
     * @param ResponseInterface $response
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($uri, $response, $message = "Request Error", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    /**
     * Returns The Guzzle response
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}