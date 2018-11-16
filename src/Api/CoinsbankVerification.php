<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;

/**
 * Class CoinsbankVerification
 *
 * @package Coinsbank\Api
 */
class CoinsbankVerification extends CoinsbankSapi
{
    const URL = '/user/verification';

    public function getData()
    {
        return $this->get(self::URL);
    }
}