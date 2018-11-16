<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankCardOperationFilter;
use Coinsbank\Filter\CoinsbankOperationFilter;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankOperation
 *
 * @package Coinsbank\Api
 */
class CoinsbankOperation extends CoinsbankSapi
{
    const URL = '/operation';
    const URL_CARD = self::URL . '/card';

    /**
     * Returns operations list.
     *
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankOperationFilter $filter
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
     * Returns cards operations list.
     *
     * @param string $cardId
     * @param int $page
     * @param int $pageSize
     * @param array|CoinsbankCardOperationFilter $filter
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getCardData(
        $cardId,
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $exportPDF = false
    ) {
        return $this->get($this->getPathWithId(self::URL_CARD, $cardId), compact('page', 'pageSize', 'filter', 'exportPDF'));
    }
}