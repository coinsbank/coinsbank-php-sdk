<?php

namespace Coinsbank\Constant;

/**
 * Class CoinsbankPaymentStatus
 * Payments statuses list.
 *
 * @package Coinsbank\Constant
 */
class CoinsbankPaymentStatus
{
    const STATUS_PENDING = 0;
    const STATUS_REJECTED = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_CANCELLED = 3;
    const STATUS_COMPLETED = 4;
    const STATUS_FAILED = 5;
    const STATUS_ON_HOLD = 6;
    const STATUS_NEW = 7;
    const STATUS_AWAITING_CONFIRMATION = 8;
    const STATUS_AWAITING_APPROVAL = 9;
    const STATUS_APPROVED = 10;
    const STATUS_AWAITING_USER_REGISTRATION = 12;
    const STATUS_AWAITING_CONFIRMATION_NON_CANCELLABLE = 13;
    const STATUS_REVERSED = 14;
    const STATUS_EXCEPTION = 15;
    const STATUS_AWAITING_CHARGE = 16;
}