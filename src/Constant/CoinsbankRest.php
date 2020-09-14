<?php

namespace Coinsbank\Constant;

/**
 * Class Rest
 *
 * @package Coinsbank\Constant
 */
class CoinsbankRest
{
    const GET = 'get';
    const POST = 'post';
    const PUT = 'put';
    const DELETE = 'delete';

    const SORT_ASC = 'asc';
    const SORT_DESC = 'desc';

    const DEFAULT_PAGE_SIZE = 50;
    const MAX_PAGE_SIZE = 200;

    const REST_SAPI_URI = "https://coinsbank.com/sapi";
    const REST_API_URI = "https://coinsbank.com/api";

    const REST_SAPI_SANDBOX_URI = "https://api.master.coinsbank.integration.cbdev.me";
    const REST_API_SANDBOX_URI = "https://api.master.coinsbank.integration.cbdev.me";
}