<?php

namespace Coinsbank\Auth;

/**
 * Class Signature
 *
 * @package Coinsbank\Auth
 */
class CoinsbankSignature
{
    /**
     * @var string REST-API key
     */
    protected $key;

    /**
     * @var string REST-API secret
     */
    protected $secret;

    /**
     * Signature constructor.
     *
     * @param $key
     * @param $secret
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * Extracts body part of request data.
     *
     * @param array $data
     * @return mixed
     */
    protected function getBody($data)
    {
        //multipart data isn't used in signature
        return !is_array($data) ? [] : (isset($data['json']) ? $data['json'] : (isset($data['multipart']) ? [] : (isset($data['query']) ? $data['query'] : $data)));
    }

    /**
     * Extracts path from URI.
     *
     * @param string $pathInfo
     * @return bool|string
     */
    protected function getPath($pathInfo)
    {
        return trim(parse_url($pathInfo, PHP_URL_PATH), "/");
    }

    /**
     * Generates signature for auth.
     *
     * @param array $data
     * @param string $uri
     * @param string $requestType POST|GET|PUT|DELETE
     * @return string
     */
    public function generate($data, $uri, $requestType)
    {
        $signatureData = http_build_query(['_key' => $this->key, '_method' => $this->getPath($uri), '_type' => strtoupper($requestType)] + (array)$this->getBody($data));

        return hash_hmac('sha512', $signatureData, $this->secret);
    }

    /**
     * Returns REST-API key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
}