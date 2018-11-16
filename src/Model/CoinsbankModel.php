<?php

namespace Coinsbank\Model;

use Coinsbank\Exception\CoinsbankSDKException;

/**
 * Class CoinsbankModel
 *
 * @package Coinsbank\Model
 */
class CoinsbankModel
{
    /**
     * Set property value.
     *
     * @param string $name
     * @param array $arguments
     * @return $this
     * @throws CoinsbankSDKException
     */
    public function __call($name, $arguments)
    {
        if (strpos($name, 'set') === 0 && strlen($name) > 3) {
            $property = lcfirst(substr($name, 3));
            if (property_exists($this, $property)) {
                if (isset($arguments[0])) {
                    $this->$property = $arguments[0];
                } else {
                    throw new CoinsbankSDKException('No value for property "' . $property . '""');
                }

                return $this;
            } else {
                throw new CoinsbankSDKException('Unknown property "' . $property . '""');
            }
        }
    }
}