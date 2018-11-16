<?php

namespace Coinsbank\Model;

use Coinsbank\Api\CoinsbankWithdrawal;

/**
 * Class CoinsbankWithdrawalModel
 *
 * @package Coinsbank\Model
 *
 * @method CoinsbankWithdrawalModel setAccountId($value)
 * @method CoinsbankWithdrawalModel setAddress($value)
 * @method CoinsbankWithdrawalModel setAmount($value)
 * @method CoinsbankWithdrawalModel setBankAddress($value)
 * @method CoinsbankWithdrawalModel setBankName($value)
 * @method CoinsbankWithdrawalModel setBeneficiaryAddress($value)
 * @method CoinsbankWithdrawalModel setBeneficiaryName($value)
 * @method CoinsbankWithdrawalModel setComment($value)
 * @method CoinsbankWithdrawalModel setCurrency($value)
 * @method CoinsbankWithdrawalModel setIban($value)
 * @method CoinsbankWithdrawalModel setPaymentSystem($value)
 * @method CoinsbankWithdrawalModel setSwift($value)
 * @method CoinsbankWithdrawalModel setUrgent($value)
 */
class CoinsbankWithdrawalModel extends CoinsbankModel
{
    /**
     * @var string Wallet for withdrawal from.
     */
    public $accountId;
    /**
     * @var string Withdrawal address (hash, external payment system account id, etc.).
     */
    public $address;

    /**
     * @var double Amount of withdrawal
     */
    public $amount;

    /**
     * @var string Bank details (required for WRT + RUB)
     */
    public $bankAddress;

    /**
     * @var string Bank details
     */
    public $bankName;

    /**
     * @var string Bank details (required for WRT + RUB)
     */
    public $beneficiaryAddress;

    /**
     * @var string Bank details
     */
    public $beneficiaryName;

    /**
     * @var string Comment
     */
    public $comment;

    /**
     * @var string Currency
     */
    public $currency;

    /**
     * @var string Bank details
     */
    public $iban;

    /**
     * @var string Payment system.
     * @see CoinsbankWithdrawal::getAvailable The list of available payment systems.
     */
    public $paymentSystem;

    /**
     * @var string Bank details
     */
    public $swift;

    /**
     * @var integer Urgent withdrawal = 1.
     */
    public $urgent;
}