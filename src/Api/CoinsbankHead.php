<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankHead
 *
 * @package Coinsbank\Api
 */
class CoinsbankHead extends CoinsbankSapi
{
    const URL = '/head';

    /**
     * Gets head data (available for unauthorized).
     *
     * @return CoinsbankResponse
     */
    public function getData()
    {
        return $this->get(self::URL);
    }
}