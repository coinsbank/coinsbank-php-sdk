<?php

namespace Coinsbank\Model;

/**
 * Class CoinsbankFileModel
 *
 * @package Coinsbank\Model
 *
 * @method CoinsbankFileModel setAttachment($value)
 * @method CoinsbankFileModel setAttachment_original($value)
 * @method CoinsbankFileModel setKey($value)
 */
class CoinsbankFileModel extends CoinsbankModel
{
    /**
     * @var string File name.
     */
    public $attachment;

    /**
     * @var string Original file name.
     */
    public $attachment_original;

    /**
     * @var string File key.
     */
    public $key;
}