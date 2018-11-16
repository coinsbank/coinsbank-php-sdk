<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Constant\CoinsbankRest;
use Coinsbank\Filter\CoinsbankTradeFilter;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class Trade
 *
 * @package Coinsbank\Api
 */
class CoinsbankTrade extends CoinsbankSapi
{
    const URL = '/trade';
    const URL_FEE = self::URL . '/fee';
    const URL_HISTORY = self::URL . '/closing';
    const URL_OHLCV = self::URL . '/ohlcv';

    const DIRECTION_BUY = 'buy';
    const DIRECTION_SELL = 'sell';

    const COMMISSION_TYPE_FROM = 0;
    const COMMISSION_TYPE_TO = 1;

    const QUOTE_FROM = 0;
    const QUOTE_TO = 1;

    const ACTION_RESET_SL = 'resetsl';
    const ACTION_RESET_SL_TP = 'resetsltp';
    const ACTION_RESET_TP = 'resettp';

    /**
     * Cancels trade order.
     *
     * @param string $id
     * @return CoinsbankResponse
     */
    public function cancelOrder($id)
    {
        return $this->delete($this->getPathWithId(self::URL, $id));
    }

    /**
     * Creates new trade order.
     *
     * @param string $fromUserAccount example: buy BTCUSD: from=USD account; sell BTCUSD: from=BTC account
     * @param string $toUserAccount example: buy BTCUSD: to=BTC account; sell BTCUSD: to=USD account
     * @param double $amount
     * @param integer $commissionType - Where is commission get from ($fromUserAccount - 0 or $toUserAccount - 1)
     * @param double|null $exchangeRate
     * @param double|null $stopLoss
     * @param double|null $takeProfit
     * @return CoinsbankResponse
     */
    public function createOrder(
        $fromUserAccount,
        $toUserAccount,
        $amount,
        $commissionType = CoinsbankTrade::COMMISSION_TYPE_FROM,
        $exchangeRate = null,
        $stopLoss = null,
        $takeProfit = null
    ) {
        return $this->post(self::URL, compact('fromUserAccount', 'toUserAccount', 'amount', 'commissionType', 'exchangeRate', 'stopLoss', 'takeProfit'));
    }

    /**
     * Gets fee data.
     *
     * @param string $fromUserAccount example: buy BTCUSD: from=USD account; sell BTCUSD: from=BTC account
     * @param string $toUserAccount example: buy BTCUSD: to=BTC account; sell BTCUSD: to=USD account
     * @param double $amount
     * @param string $direction Sell or Buy
     * @param integer $commissionType Where is commission get from (fromUserAccount or toUserAccount account)
     * @param integer $quote What's amount relative to (sell + 0 or buy + 1 - fromUserAccount, sell + 1 or buy + 0 - toUserAccount)
     * @param double|null $exchangeRate
     * @param double|null $stopLoss
     * @param double|null $takeProfit
     * @return CoinsbankResponse
     */
    public function getFeeData(
        $fromUserAccount,
        $toUserAccount,
        $amount,
        $direction,
        $commissionType = CoinsbankTrade::COMMISSION_TYPE_FROM,
        $quote = self::QUOTE_FROM,
        $exchangeRate = null,
        $stopLoss = null,
        $takeProfit = null
    ) {
        return $this->get(self::URL_FEE, compact('fromUserAccount', 'toUserAccount', 'amount', 'commissionType', 'direction', 'quote', 'exchangeRate', 'stopLoss', 'takeProfit'));
    }

    /**
     * Return trade order info.
     *
     * @param string $id Trade order ID
     * @return CoinsbankResponse
     */
    public function getOrder($id)
    {
        return $this->get($this->getPathWithId(self::URL, $id));
    }

    /**
     * Returns trade orders list.
     *
     * @param integer $page
     * @param integer $pageSize
     * @param array|CoinsbankTradeFilter $filter
     * @param bool $exportPDF
     * @return CoinsbankResponse
     */
    public function getOrders(
        $page = 0,
        $pageSize = CoinsbankRest::DEFAULT_PAGE_SIZE,
        $filter = [],
        $exportPDF = false
    ) {
        return $this->get(self::URL, compact('page', 'pageSize', 'filter', 'exportPDF'));
    }

    /**
     * Returns order closing history.
     *
     * @param string $id
     * @return CoinsbankResponse
     */
    public function orderHistory($id)
    {
        return $this->get($this->getPathWithId(self::URL_HISTORY, $id));
    }

    /**
     * Updates trade order (resets tp, sl, sltp).
     *
     * @param string $id
     * @param string $action
     * @return CoinsbankResponse
     */
    public function updateOrder($id, $action)
    {
        return $this->put($this->getPathWithId(self::URL, $id), compact('action'));
    }

    public function getOhlcvData($pairCode, $interval)
    {
        return $this->get(self::URL_OHLCV, compact('pairCode', 'interval'));
    }

}