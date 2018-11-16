<?php

namespace Coinsbank\Constant;

/**
 * Class CoinsbankTradeStatus
 * Trade statuses list.
 *
 * @package Coinsbank\Constant
 */
class CoinsbankTradeStatus
{
    const TRADE_STATUS_INIT = 0;
    const TRADE_STATUS_OPEN = 1;
    const TRADE_STATUS_CLOSED = 2;
    const TRADE_STATUS_CANCELLED = 3;
    const TRADE_STATUS_HOLD = 4;
    const TRADE_STATUS_PENDING_TP = 5;
    const TRADE_STATUS_PENDING_SL = 6;
}