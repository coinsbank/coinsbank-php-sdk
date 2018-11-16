<?php

namespace Coinsbank\Filter;

use Coinsbank\Constant\CoinsbankMerchantStatus;
use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankMerchantFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankMerchantFilter setAmountFrom($value)
 * @method CoinsbankMerchantFilter setAmountTo($value)
 * @method CoinsbankMerchantFilter setCaption($value)
 * @method CoinsbankMerchantFilter setCurrency($value)
 * @method CoinsbankMerchantFilter setDateCreatedFrom($value)
 * @method CoinsbankMerchantFilter setDateCreatedTo($value)
 * @method CoinsbankMerchantFilter setEmail($value)
 * @method CoinsbankMerchantFilter setPhone($value)
 * @method CoinsbankMerchantFilter setStatus($value)
 * @method CoinsbankMerchantFilter setUniqueId($value)
 */
class CoinsbankMerchantFilter extends CoinsbankModel
{
    /**
     * @var double
     */
    public $amountFrom;

    /**
     * @var double
     */
    public $amountTo;

    /**
     * @var string Invoice title
     */
    public $caption;

    /**
     * @var string|string[]
     */
    public $currency;

    /**
     * @var string
     */
    public $dateCreatedFrom;

    /**
     * @var string
     */
    public $dateCreatedTo;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string|string[]
     * @see CoinsbankMerchantStatus
     */
    public $status;

    /**
     * @var string|string[] Merchant invoice ID.
     */
    public $uniqueId;
}