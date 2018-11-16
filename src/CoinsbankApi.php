<?php

namespace Coinsbank;

use Coinsbank\Constant\CoinsbankRest;

/**
 * Class CoinsbankApi
 *
 * @package Coinsbank
 */
class CoinsbankApi extends Coinsbank
{
    /**
     * Returns proper API uri.
     *
     * @return string
     */
    protected function getApiUri()
    {
        switch ($this->context->getMode()) {
            case CoinsbankApiContext::MODE_SANDBOX:
                $uri = CoinsbankRest::REST_API_SANDBOX_URI;
                break;
            case CoinsbankApiContext::MODE_PRODUCTION:
            default:
                $uri = CoinsbankRest::REST_API_URI;
                break;
        }

        return $uri;
    }
}