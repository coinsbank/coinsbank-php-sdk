<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankMerchantFilter;
use Coinsbank\Model\CoinsbankMerchantInvoiceModel;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Merchant
 *
 * @package Coinsbank\Api
 */
class CoinsbankMerchant extends CoinsbankSapi
{
    const URL = '/merchant';
    const URL_ACCEPT = self::URL . '/accept';
    const URL_ACTIVATE = self::URL . '/activate';
    const URL_FEE = self::URL . '/fee';

    /**
     * Activate merchant service.
     *
     * @return CoinsbankResponse
     */
    public function activateMerchantService()
    {
        return $this->post(self::URL_ACTIVATE);
    }

    /**
     * Cancels invoice.
     *
     * @param string $id Invoice ID.
     * @return CoinsbankResponse
     */
    public function cancelInvoice($id)
    {
        return $this->delete($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates invoice.
     *
     * @param array|CoinsbankMerchantInvoiceModel $data
     * @return CoinsbankResponse
     */
    public function createInvoice($data)
    {
        return $this->post(self::URL, $data);
    }

    /**
     * Force invoice close.
     *
     * @param string $id Invoice ID.
     * @param string $currencyAccept Accepted customer's currency (available in statuses: MerchantOrderModel::STATUS_VIEWED, MerchantOrderModel::STATUS_STARTED, MerchantOrderModel::STATUS_PARTIAL_PAID)
     * @return CoinsbankResponse
     */
    public function forceInvoiceClose($id, $currencyAccept)
    {
        return $this->put($this->getPathWithId(self::URL_ACCEPT, $id), ['currencyaccept' => $currencyAccept]);
    }

    /**
     * Returns invoices list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankMerchantFilter $filter
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getData(
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $exportPDF = false
    ) {
        return $this->get(self::URL, compact('page', 'pageSize', 'filter', 'exportPDF'));
    }

    /**
     * Returns merchant invoice fee.
     *
     * @param double $amount
     * @param string $currency
     * @return CoinsbankResponse
     */
    public function getFee($amount, $currency)
    {
        return $this->get(self::URL_FEE, ['amount' => $amount, 'currency' => $currency]);
    }

    /**
     * Returns invoice details.
     *
     * @param string $id Invoice ID.
     * @return CoinsbankResponse
     */
    public function getInvoiceData($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Returns status of merchant service (activated or not).
     *
     * @return CoinsbankResponse
     */
    public function getMerchantServiceStatus()
    {
        return $this->get(self::URL_ACTIVATE);
    }
}