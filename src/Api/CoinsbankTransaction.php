<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankTransactionFilter;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankTransaction
 *
 * @package Coinsbank\Api
 */
class CoinsbankTransaction extends CoinsbankSapi
{
    const URL = '/transaction';

    /**
     * Returns transactions list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankTransactionFilter $filter
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
}