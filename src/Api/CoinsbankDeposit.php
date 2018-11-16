<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Model\CoinsbankDepositModel;
use Coinsbank\Model\CoinsbankFileModel;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Deposit
 *
 * @package Coinsbank\Api
 *
 */
class CoinsbankDeposit extends CoinsbankSapi
{
    const URL = '/wallet/deposit';
    const URL_AVAILABLE = self::URL . '/available';
    const URL_DOCUMENT = self::URL . '/doc';
    const URL_FEE = self::URL . '/fee';
    const URL_FSC_VERIFICATION = self::URL . '/fscVerification';

    const FSC_DOC_TYPE_BACK = 'card_back';
    const FSC_DOC_TYPE_FRONT = 'card_front';
    const FSC_DOC_TYPE_SELFIE = 'card_selfie';

    /**
     * Cancels deposit.
     *
     * @param string $id Deposit ID
     * @return CoinsbankResponse
     */
    public function cancelDeposit($id)
    {
        return $this->delete($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates deposit.
     *
     * @param array|CoinsbankDepositModel $data
     * @return CoinsbankResponse
     */
    public function createDeposit($data)
    {
        return $this->post(self::URL, $data);
    }

    /**
     * Verifies FSC deposit with code.
     *
     * @param string $id Deposit ID.
     * @param string $code Verification code.
     * @return CoinsbankResponse
     */
    public function fscVerification($id, $code)
    {
        return $this->put($this->getPathWithId(self::URL_FSC_VERIFICATION, $id), ['code' => $code]);
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
     * Returns deposit data.
     *
     * @param string $id Deposit ID
     * @return CoinsbankResponse
     */
    public function getData($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Returns deposit document data.
     *
     * @param string $id Deposit ID.
     * @return CoinsbankResponse
     */
    public function getDocument($id)
    {
        return $this->get($this->getPathWithId(self::URL_DOCUMENT, $id));
    }

    /**
     * Returns FSC deposit document data.
     *
     * @param string $id
     * @param string $type card_selfie|card_front|card_back
     * @return CoinsbankResponse
     */
    public function getFSCDocument($id, $type)
    {
        return $this->get($this->getPathWithId(self::URL_DOCUMENT, $id), ['type' => $type]);
    }

    /**
     * Returns deposit fee.
     *
     * @param double $amount
     * @param string $currency
     * @param string $paymentSystem The list of available payment systems's returned by method getAvailable
     * @return CoinsbankResponse
     */
    public function getFee($amount, $currency, $paymentSystem)
    {
        return $this->get(self::URL_FEE, ['amount' => $amount, 'currency' => $currency, 'ps_code' => $paymentSystem]);
    }

    /**
     * Upload document for Deposit (not-FSC).
     *
     * @param string $id
     * @param array|CoinsbankFileModel $fileData
     * @return CoinsbankResponse
     */
    public function uploadDocument($id, $fileData)
    {
        return $this->put($this->getPathWithId(self::URL_DOCUMENT, $id), $fileData);
    }

    /**
     * Upload documents for FSC Deposit.
     *
     * @param string $id
     * @param array|CoinsbankFileModel $cardSelfieFileData
     * @param array|CoinsbankFileModel $cardFrontFileData
     * @param array|CoinsbankFileModel $cardBackFileData
     * @return CoinsbankResponse
     */
    public function uploadFSCDocuments($id, $cardSelfieFileData, $cardFrontFileData, $cardBackFileData)
    {
        return $this->put($this->getPathWithId(self::URL_DOCUMENT, $id), ['card_selfie' => $cardSelfieFileData, 'card_front' => $cardFrontFileData, 'card_back' => $cardBackFileData]);
    }
}