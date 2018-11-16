<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankFreeze
 *
 * @package Coinsbank\Api
 */
class CoinsbankFreeze extends CoinsbankSapi
{
    const URL = '/freeze';

    /**
     * Returns freeze list.
     *
     * @return CoinsbankResponse
     */
    public function getData()
    {
        return $this->get(self::URL);
    }
}