<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Model\CoinsbankWithdrawalModel;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Withdrawal
 *
 * @package Coinsbank\Api
 */
class CoinsbankWithdrawal extends CoinsbankSapi
{
    const URL = '/wallet/withdrawal';
    const URL_AVAILABLE = self::URL . '/available';
    const URL_FEE = self::URL . '/fee';
    const URL_GIFT = self::URL_TRANSFER . '/gift';
    const URL_TRANSFER = '/wallet/transfer';

    /**
     * Activates gifts (CBE with not registered address - email or login).
     *
     * @param $code
     * @return CoinsbankResponse
     */
    public function activateGift($code)
    {
        return $this->post($this->getPathWithId(self::URL_GIFT, $code));
    }

    /**
     * Cancels transfer (CBE, CBI withdrawals).
     *
     * @param string $id Withdrawal ID
     * @return CoinsbankResponse
     */
    public function cancelTransfer($id)
    {
        return $this->delete($this->getPathWithId(self::URL_TRANSFER, $id));
    }

    /**
     * Cancels withdrawal (not CBE, CBI).
     *
     * @param string $id Withdrawal ID
     * @return CoinsbankResponse
     */
    public function cancelWithdrawal($id)
    {
        return $this->delete($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates withdrawal.
     *
     * @param array|CoinsbankWithdrawalModel $data
     * @return CoinsbankResponse
     */
    public function createWithdrawal($data)
    {
        return $this->post(self::URL, $data);
    }

    /**
     * Returns available payment systems with limits and wallet info.
     *
     * @param string $accountId
     * @return CoinsbankResponse
     */
    public function getAvailable($accountId)
    {
        return $this->get($this->getPathWithId(self::URL_AVAILABLE, $accountId));
    }

    /**
     * Returns withdrawal fee.
     *
     * @param double $amount
     * @param string $currency
     * @param string $paymentSystem The list of available payment systems's returned by method getAvailable
     * @param string $accountId
     * @param int $urgent
     * @param string $address Required for CBI, CBE
     * @return CoinsbankResponse
     */
    public function getFee($amount, $currency, $paymentSystem, $accountId, $urgent = 0, $address = null)
    {
        return $this->get(self::URL_FEE, ['amount' => $amount, 'currency' => $currency, 'paymentSystem' => $paymentSystem, 'accountId' => $accountId, 'urgent' => $urgent, 'address' => $address]);
    }
}