<?php

namespace Coinsbank\Filter;

use Coinsbank\Constant\CoinsbankPaymentStatus;
use Coinsbank\Constant\CoinsbankTradeStatus;
use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankOperationFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankOperationFilter setAccountId($value)
 * @method CoinsbankOperationFilter setAmountFrom($value)
 * @method CoinsbankOperationFilter setAmountTo($value)
 * @method CoinsbankOperationFilter setCurrency($value)
 * @method CoinsbankOperationFilter setDateCreateFrom($value)
 * @method CoinsbankOperationFilter setDateCreateTo($value)
 * @method CoinsbankOperationFilter setDateUpdateFrom($value)
 * @method CoinsbankOperationFilter setDateUpdateTo($value)
 * @method CoinsbankOperationFilter setIsActive($value)
 * @method CoinsbankOperationFilter setOperationType($value)
 * @method CoinsbankOperationFilter setStatus($value)
 * @method CoinsbankOperationFilter setUserComment($value)
 */
class CoinsbankOperationFilter extends CoinsbankModel
{
    /**
     * Operations types list.
     */
    const TYPE_DEPOSIT = 1;
    const TYPE_WITHDRAWAL = 2;
    const TYPE_SEND_TO_OWNS = 3;
    const TYPE_GET_FROM_OWNS = 4;
    const TYPE_SEND_TO_OTHERS = 5;
    const TYPE_GET_FROM_OTHERS = 6;
    const TYPE_EXCHANGE = 7;
    const TYPE_MERCHANT_TRANSFER = 8;
    const TYPE_TRADE_ORDER = 9;

    /**
     * @var string|string[] Wallet ID.
     */
    public $accountId;

    /**
     * @var double
     */
    public $amountFrom;

    /**
     * @var double
     */
    public $amountTo;

    /**
     * @var string|string[]
     */
    public $currency;

    /**
     * @var string
     */
    public $dateCreateFrom;

    /**
     * @var string
     */
    public $dateCreateTo;

    /**
     * @var string
     */
    public $dateUpdateFrom;

    /**
     * @var string
     */
    public $dateUpdateTo;

    /**
     * @var boolean
     */
    public $isActive;

    /**
     * @var string|string[]
     */
    public $operationType;

    /**
     * @var integer|integer[]
     * @see CoinsbankTradeStatus
     * @see CoinsbankPaymentStatus
     */
    public $status;

    /**
     * @var string
     */
    public $userComment;
}