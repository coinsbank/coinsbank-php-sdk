<?php

namespace Coinsbank\Constant;

use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankMerchantStatus
 *
 * @package Coinsbank\Constant
 *
 */
class CoinsbankMerchantStatus extends CoinsbankModel
{
    const STATUS_NEW = 0;
    const STATUS_VIEWED = 1;
    const STATUS_STARTED = 2;
    const STATUS_PARTIAL_PAID = 3;
    const STATUS_PAID = 4;
    const STATUS_EXPIRED = 98;
    const STATUS_CANCELLED = 99;
}