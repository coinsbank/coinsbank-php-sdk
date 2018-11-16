<?php
/**
 *
 * User: Roma
 * Date: 21.04.2017
 * Time: 15:52
 */

namespace Coinsbank\Api;


use Coinsbank\CoinsbankSapi;
use Coinsbank\Model\CoinsbankMerchantPaymentModel;
use Coinsbank\Transport\CoinsbankResponse;

class CoinsbankMerchantPayment extends CoinsbankSapi
{
    const URL = '/customer';
    const URL_TRANSFER = self::URL . '/transfer';

    /**
     * Returns invoice details for customer (available in unauthorized mode).
     *
     * @param string $id Invoice ID.
     * @return CoinsbankResponse
     */
    public function getInvoiceData($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Pays invoice by customer's transfer on Coinsbank.
     *
     * @param string $id Invoice ID.
     * @param string $accountId Wallet ID to pay from.
     * @return CoinsbankResponse
     */
    public function payInvoiceByTransfer($id, $accountId)
    {
        return $this->put($this->getPathWithId(self::URL_TRANSFER, $id), ['accountId' => $accountId]);
    }

    /**
     * Updates invoice data by customer before payment: set payment currency, auto fix rate and set customer info (available in unauthorized mode).
     *
     * @param string $id Invoice ID.
     * @param array|CoinsbankMerchantPaymentModel $data
     * @return CoinsbankResponse
     */
    public function setInvoiceData($id, $data)
    {
        return $this->put($this->getPathWithId(self::URL, $id), $data);
    }
}