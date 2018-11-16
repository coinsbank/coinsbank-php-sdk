<?php

namespace Coinsbank\Filter;

use Coinsbank\Model\CoinsbankModel;

/**
 * Class CoinsbankCardOperationFilter
 *
 * @package Coinsbank\Filter
 *
 * @method CoinsbankCardOperationFilter setAmountFrom($value)
 * @method CoinsbankCardOperationFilter setAmountTo($value)
 * @method CoinsbankCardOperationFilter setCreatedFrom($value)
 * @method CoinsbankCardOperationFilter setCreatedTo($value)
 * @method CoinsbankCardOperationFilter setMerchant($value)
 */
class CoinsbankCardOperationFilter extends CoinsbankModel
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
     * @var string
     */
    public $createdFrom;

    /**
     * @var string
     */
    public $createdTo;

    /**
     * @var string
     */
    public $merchant;
}