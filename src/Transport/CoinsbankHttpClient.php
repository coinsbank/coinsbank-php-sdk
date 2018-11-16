<?php

namespace Coinsbank\Transport;

use Coinsbank\Exception\CoinsbankRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 *
 * @package Coinsbank\Transport
 */
class CoinsbankHttpClient
{
    protected $guzzleClient;

    /**
     * HttpClient constructor.
     *
     * @param array $options Curl options
     */
    public function __construct($options = [])
    {
        $this->guzzleClient = new Client($options);
    }

    /**
     * Sends request to the URI.
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return CoinsbankResponse
     * @throws CoinsbankRequestException
     */
    public function send($method, $uri, $options = [])
    {
        try {
            $response = $this->guzzleClient->request($method, $uri, $options);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if (!$response instanceof ResponseInterface) {
                throw new CoinsbankRequestException($uri, $e->getResponse(), $e->getMessage(), $e->getCode(), $e);
            }
        }
        $responseHeaders = $response->getHeaders();
        $responseBody = $response->getBody()->getContents();
        $httpResponseCode = $response->getStatusCode();

        return new CoinsbankResponse($responseHeaders, $responseBody, $httpResponseCode);
    }
}