<?php

namespace Coinsbank\Filter;

use Coinsbank\Constant\CoinsbankTransactionType;
use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankTransactionFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankTransactionFilter setAccountId($value)
 * @method CoinsbankTransactionFilter setAmountFrom($value)
 * @method CoinsbankTransactionFilter setAmountTo($value)
 * @method CoinsbankTransactionFilter setCard($value)
 * @method CoinsbankTransactionFilter setCardUniqueId($value)
 * @method CoinsbankTransactionFilter setCurrency($value)
 * @method CoinsbankTransactionFilter setDateCreateFrom($value)
 * @method CoinsbankTransactionFilter setDateCreateTo($value)
 * @method CoinsbankTransactionFilter setTransactionType($value)
 * @method CoinsbankTransactionFilter setTransactionTypeGroup($value)
 */
class CoinsbankTransactionFilter extends CoinsbankModel
{
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
     * @var boolean Is it card operation or not
     */
    public $card;

    /**
     * @var string Card ID
     */
    public $cardUniqueId;

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
     * @var string|string[] Not work togheter with filter transactionTypeGroup, only separately
     * @see CoinsbankTransactionType
     */
    public $transactionType;

    /**
     * @var string|string[]
     * @see CoinsbankTransactionType
     */
    public $transactionTypeGroup;
}