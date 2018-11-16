<?php

namespace Coinsbank\Api;

use Coinsbank\CoinsbankSapi;
use Coinsbank\Transport\CoinsbankResponse;

/**
 * Class CoinsbankFile
 *
 * @package Coinsbank\Api
 */
class CoinsbankFile extends CoinsbankSapi
{
    const URL = '/file';

    /**
     * Deletes file before using in any method.
     *
     * @param string $fileKey File key, in response after uploading file, param "key".
     * @param string $fileName File name, in response after uploading file, param "filename".
     * @return CoinsbankResponse
     */
    public function deleteFile($fileKey, $fileName)
    {
        return $this->delete(self::URL, ['key' => $fileKey, 'filename' => $fileName]);
    }

    /**
     * Get file content before using in any method.
     *
     * @param string $fileKey File key, in response after uploading file, param "key".
     * @param string $fileName File name, in response after uploading file, param "filename".
     * @return CoinsbankResponse
     */
    public function getFile($fileKey, $fileName)
    {
        return $this->get(self::URL, ['key' => $fileKey, 'filename' => $fileName]);
    }

    /**
     * Uploads file to the API-server.
     *
     * @param string $fileName
     * @param string $fileContent
     * @return CoinsbankResponse
     */
    public function uploadFile($fileName, $fileContent)
    {
        return $this->post(self::URL, [['name' => 'FileModel[picture]', 'filename' => $fileName, 'contents' => $fileContent]], [], true);
    }

}