<?php

namespace Coinsbank;

use Coinsbank\Auth\CoinsbankSignature;
use Coinsbank\Transport\CoinsbankHttpClient;

/**
 * Class CoinsbankAuth
 *
 * @package Coinsbank\Auth
 */
class CoinsbankApiContext
{
    const DEFAULT_CONNECTION_TIMEOUT = 10;
    const DEFAULT_CURL_TIMEOUT = 60;

    const MODE_SANDBOX = 0;
    const MODE_PRODUCTION = 1;

    protected $httpConfig;

    protected $key;

    protected $mode;

    protected $secret;

    protected $signature;

    public function __construct($key, $secret, $httpSettings = [], $mode = self::MODE_PRODUCTION)
    {
        $this->key = $key;
        $this->mode = $mode;
        $this->secret = $secret;
        $this->signature = new CoinsbankSignature($key, $secret);
        $httpSettings = [
            'curl' => $httpSettings + [
                    CURLOPT_CONNECTTIMEOUT => self::DEFAULT_CONNECTION_TIMEOUT,
                    CURLOPT_TIMEOUT        => self::DEFAULT_CURL_TIMEOUT,
                    CURLOPT_USERAGENT      => 'Coinsbank-PHP-SDK',
                    CURLOPT_RETURNTRANSFER => true,

                ]
        ];
        $this->client = new CoinsbankHttpClient($httpSettings);
    }

    /**
     * Returns http-client.
     *
     * @return CoinsbankHttpClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Return mode.
     *
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Returns REST-API key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Returns REST-API secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    public function getSignature()
    {
        return $this->signature;
    }
}