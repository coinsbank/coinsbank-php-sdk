<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankApi;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankBitcoinchart
 *
 * @package Coinsbank\Api
 */
class CoinsbankBitcoinchart extends CoinsbankApi
{
    const URL = '/bitcoincharts';
    const URL_TRADES = self::URL . '/trades';
    const URL_ORDERBOOK = self::URL . '/orderbook';

    /**
     * Gets trade history.
     *
     * @param string $currencyPair
     * @return CoinsbankResponse
     */
    public function getTrades($currencyPair)
    {
        return $this->get(self::URL_TRADES . '/' . $currencyPair);
    }

    /**
     * Gets orderbook.
     *
     * @param string $currencyPair
     * @return CoinsbankResponse
     */
    public function getOrderBook($currencyPair)
    {
        return $this->get(self::URL_ORDERBOOK . '/' . $currencyPair);
    }
}