<?php

namespace Coinsbank\Model;

/**
 * Class CoinsbankMerchantInvoiceModel
 *
 * @package Coinsbank\Model
 *
 * @method CoinsbankMerchantInvoiceModel setAmount($value)
 * @method CoinsbankMerchantInvoiceModel setBuyerEmail($value)
 * @method CoinsbankMerchantInvoiceModel setBuyerPhone($value)
 * @method CoinsbankMerchantInvoiceModel setCommissionType($value)
 * @method CoinsbankMerchantInvoiceModel setCurrency($value)
 * @method CoinsbankMerchantInvoiceModel setCurrencyWish($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerAddress($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerCity($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerCountry($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerFullName($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerRegion($value)
 * @method CoinsbankMerchantInvoiceModel setCustomerZip($value)
 * @method CoinsbankMerchantInvoiceModel setMerchantNumber($value)
 * @method CoinsbankMerchantInvoiceModel setServiceDescription($value)
 * @method CoinsbankMerchantInvoiceModel setServiceName($value)
 * @method CoinsbankMerchantInvoiceModel setTtl($value)
 */
class CoinsbankMerchantInvoiceModel extends CoinsbankModel
{
    const COMMISSION_TYPE_MERCHANT = 0;
    const COMMISSION_TYPE_ADDED_TO_PRICE = 1;

    /**
     * @var double
     */
    public $amount;

    /**
     * @var string
     */
    public $buyerEmail;

    /**
     * @var string
     */
    public $buyerPhone;

    /**
     * @var string
     */
    public $commissionType;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string Currency to get (default=currency)
     */
    public $currencyWish;

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
     * @var string External merchant's invoice number
     */
    public $merchantNumber;

    /**
     * @var string
     */
    public $serviceDescription;

    /**
     * @var string
     */
    public $serviceName;

    /**
     * @var integer Invoice time to live in seconds
     */
    public $ttl;
}