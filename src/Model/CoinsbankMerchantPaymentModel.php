<?php

namespace Coinsbank\Model;

/**
 * Class CoinsbankMerchantPaymentModel
 *
 * @package Coinsbank\Model
 *
 * @method CoinsbankMerchantPaymentModel setCustomerAddress($value)
 * @method CoinsbankMerchantPaymentModel setCustomerCity($value)
 * @method CoinsbankMerchantPaymentModel setCustomerCountry($value)
 * @method CoinsbankMerchantPaymentModel setCustomerFullName($value)
 * @method CoinsbankMerchantPaymentModel setCustomerRegion($value)
 * @method CoinsbankMerchantPaymentModel setCustomerZip($value)
 * @method CoinsbankMerchantPaymentModel setPayInCurrency($value)
 */
class CoinsbankMerchantPaymentModel extends CoinsbankModel
{
    /**
     * @var string
     */
    public $customerAddress;

    /**
     * @var string
     */
    public $customerCity;

    /**
     * @var string
     */
    public $customerCountry;

    /**
     * @var string
     */
    public $customerFullName;

    /**
     * @var string
     */
    public $customerRegion;

    /**
     * @var string
     */
    public $customerZip;

    /**
     * @var string
     */
    public $payInCurrency;
}