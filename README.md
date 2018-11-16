Coinsbank PHP SDK for RESTful API
=======================

```php
use Coinsbank\Api\CoinsbankBitcoinchart;
use Coinsbank\Api\CoinsbankDeposit;
use Coinsbank\Api\CoinsbankFile;
use Coinsbank\Api\CoinsbankHead;
use Coinsbank\Api\CoinsbankTrade;
use Coinsbank\Api\CoinsbankWallet;
use Coinsbank\CoinsbankApiContext;
use Coinsbank\Filter\CoinsbankTradeFilter;
use Coinsbank\Model\CoinsbankDepositModel;
use Coinsbank\Model\CoinsbankFileModel;

$contextUnauthorized = new CoinsbankApiContext(null, null, [], CoinsbankApiContext::MODE_SANDBOX);

$headApiGuest = new CoinsbankHead($contextUnauthorized);
$response = $headApiGuest->getData();
$respponseCode = $response->getHttpResponseCode();
$bodyDecoded = $response->getBodyDecoded();

$bitcoinchartApi = new CoinsbankBitcoinchart($contextUnauthorized);
$response = $bitcoinchartApi->getTrades('BTCUSD');
$response = $bitcoinchartApi->getOrderBook('BTCUSD');

$contextAuthorized = new CoinsbankApiContext('{api-key}', '{api-secret}', [], CoinsbankApiContext::MODE_SANDBOX);

$headApiAuth = new CoinsbankHead($contextAuthorized);
$response = $headApiAuth->getData();

$walletApi = new CoinsbankWallet($contextAuthorized);
$response = $walletApi->getList();

$tradeApi = new CoinsbankTrade($contextAuthorized);
$tradeFilter = (new CoinsbankTradeFilter())->setStatus(1);//or array('status' => 1)
$response = $tradeApi->getOrders(0, 50, $tradeFilter, false);
//file_put_contents('orders.pdf', $response->getBody());//e.g. for pdf export
$response = $tradeApi->createOrder('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, 711.86613, 676.2728, 747.4594);
$response = $tradeApi->getOrder('30c38325-e550-4b');
$response = $tradeApi->cancelOrder('17e9149d-7da5-40');
$response = $tradeApi->updateOrder('30c38325-e550-4b', CoinsbankTrade::ACTION_RESET_SL);
$response = $tradeApi->orderHistory('30c38325-e550-4b');
$response = $tradeApi->getFeeData('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, CoinsbankTrade::DIRECTION_BUY, 711.86613, 676.2728, 747.4594);

//files processing
$fileApi = new CoinsbankFile($contextAuthorized);
$response = $fileApi->uploadFile('front.jpg', file_get_contents(__DIR__ . '/testFile.jpg'));
$httpCode = $response->getHttpResponseCode();
$filename = $response->getBodyDecoded()[0]['filename'];
$filekey = $response->getBodyDecoded()[0]['key'];
$filenameOriginal = $response->getBodyDecoded()[0]['name'];
$response = $fileApi->getFile($filekey, $filename);
file_put_contents($filenameOriginal, $response->getBody());

//deposits
$depositModelSEPA = (new CoinsbankDepositModel())
    ->setPaymentSystem('SEP')
    ->setAmount(500)
    ->setAccountId('87f8a782-1042-42')
    ->setCurrency('EUR')
    ->setDocumentPersonFront((new CoinsbankFileModel())->setAttachment($filename)->setAttachment_original($filenameOriginal)->setKey($filekey))
    ->setFirstName('John')
    ->setLastName('Doe')
    ->setPayerAccount('Account')
    ->setCountryId(40);
$depositApi = new CoinsbankDeposit($contextAuthorized);
$response = $depositApi->createDeposit($depositModelSEPA);
```

## Installing Coinsbank SDK

The recommended way to install Coinsbank is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Coinsbank SDK:

```bash
php composer.phar require coinsbank/rest-api-sdk-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Coinsbank SDK using composer:

 ```bash
composer.phar update
 ``` 
 
 See:
 ```
 examples/examples.php
 examples/example-curl-new-merchant-invoice.sh
 ```


 Specification available in Swagger 2.0 file:
 ```
 reference/coinsbank-sapi.json
 ```
