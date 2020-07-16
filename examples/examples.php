<?php
/*
 * CoinsBank API Example script
 *
 * 1. Get package with Composer
 * 2. Run php composer.phar dump-autoload -o
 * 3. Register and get API keys on https://app.master.coinsbank.integration.cbdev.me/
 * 4. Paste key and secret to corresponding variables
 * 5. Uncomment code
 *
 */

require(__DIR__ . '/../vendor/autoload.php');
//
use Coinsbank\Api\CoinsbankBitcoinchart;
use Coinsbank\Api\CoinsbankMerchant;
use Coinsbank\Api\CoinsbankWithdrawal;
use Coinsbank\CoinsbankApiContext;

$apiKey = '';
$apiSecret = '';

// METHODS WITH NO AUTH REQUIRED / PUBLIC
//<---HEAD
//$contextUnauthorized = new CoinsbankApiContext(null, null, [], CoinsbankApiContext::MODE_SANDBOX);
//$headApiGuest = new CoinsbankHead($contextUnauthorized);
//$response = $headApiGuest->getData();
//---HEAD>

//<---CHARTS AVAILABLE ON PRODUCTION ONLY
//$contextUnauthorized = new CoinsbankApiContext(null, null, [], CoinsbankApiContext::MODE_PRODUCTION); //only on production
//$bitcoinchartApi = new CoinsbankBitcoinchart($contextUnauthorized);
//$response = $bitcoinchartApi->getTrades('BTCUSD');
//$response = $bitcoinchartApi->getOrderBook('BTCUSD');
//---CHART>

// METHODS WITH AUTH REQUIRED / PRIVATE

//$contextAuthorized = new CoinsbankApiContext($apiKey, $apiSecret, [], CoinsbankApiContext::MODE_SANDBOX);

//<---HEADAUTH
//$headApiAuth = new CoinsbankHead($contextAuthorized);
//$response = $headApiAuth->getData();
//---HEADAUTH>

//<---WALLET
//$walletApi = new CoinsbankWallet($contextAuthorized);
//$response = $walletApi->getList();
//---WALLET>

//<---FILE
/*
$fileApi = new CoinsbankFile($contextAuthorized);
$response = $fileApi->uploadFile('front.jpg', file_get_contents(__DIR__ . '/testFile.jpg'));

var_dump($response->getHttpResponseCode());
var_dump($response->getBodyDecoded());
$filename = $response->getBodyDecoded()[0]['filename'];
$filekey = $response->getBodyDecoded()[0]['key'];
$filenameOriginal = $response->getBodyDecoded()[0]['name'];
sleep(1);
$fileApi = new CoinsbankFile($contextAuthorized);
$response = $fileApi->uploadFile('front.jpg', file_get_contents(__DIR__ . '/testFile.jpg'));

var_dump($response->getHttpResponseCode());
var_dump($response->getBodyDecoded());
$filename2 = $response->getBodyDecoded()[0]['filename'];
$filekey2 = $response->getBodyDecoded()[0]['key'];
$filenameOriginal2 = $response->getBodyDecoded()[0]['name'];

$fileApi = new CoinsbankFile($contextAuthorized);
$response = $fileApi->uploadFile('front.jpg', file_get_contents(__DIR__ . '/testFile.jpg'));

var_dump($response->getHttpResponseCode());
var_dump($response->getBodyDecoded());
$filename3 = $response->getBodyDecoded()[0]['filename'];
$filekey3 = $response->getBodyDecoded()[0]['key'];
$filenameOriginal3 = $response->getBodyDecoded()[0]['name'];
*/

/*
$fileApi = new CoinsbankFile($contextAuthorized);
$response = $fileApi->uploadFile('back.jpg', file_get_contents(__DIR__ . '/testFile.jpg'));

var_dump($response->getHttpResponseCode());
var_dump($response->getBodyDecoded());
$filenameBack = $response->getBodyDecoded()[0]['filename'];
$filekeyBack = $response->getBodyDecoded()[0]['key'];
$filenameOriginalBack = $response->getBodyDecoded()[0]['name'];
*/

/*
$response = $fileApi->getFile($filekey, $filename);
var_dump($response->getHttpResponseCode());
file_put_contents($filenameOriginal, $response->getBody());//e.g. for picture
$response = $fileApi->deleteFile($filekey, $filename);
var_dump($response->getHttpResponseCode());
var_dump($response->getBodyDecoded());
*/
//---FILE>

//<---DEPOSIT
//$depositApi = new CoinsbankDeposit($contextAuthorized);
//$response = $depositApi->cancelDeposit('7dc6197b-d68d-4e');
//$response = $depositApi->getAvailable('87f8a782-1042-42');
//$response = $depositApi->getData('a6a2e03d-964d-4c');
//$response = $depositApi->getFee(500, 'EUR', 'SEP');
//$response = $depositApi->uploadDocument('a6a2e03d-964d-4c', (new CoinsbankFileModel())->setAttachment($filename)->setAttachment_original($filenameOriginal)->setKey($filekey));
//$response = $depositApi->getDocument('a6a2e03d-964d-4c');
//$response = $depositApi->uploadFSCDocuments('f19fa49a-91e3-41', (new CoinsbankFileModel())->setAttachment($filename)->setAttachment_original($filenameOriginal)->setKey($filekey), (new CoinsbankFileModel())->setAttachment($filename2)->setAttachment_original($filenameOriginal2)->setKey($filekey2), (new CoinsbankFileModel())->setAttachment($filename3)->setAttachment_original($filenameOriginal3)->setKey($filekey3));
//$response = $depositApi->getFSCDocument('f19fa49a-91e3-41', CoinsbankDeposit::FSC_DOC_TYPE_SELFIE);
//$response = $depositApi->fscVerification('f19fa49a-91e3-41', 1234);

/*
$depositModelSEPA = (new CoinsbankDepositModel())
    ->setPaymentSystem('SEP')
    ->setAmount(500)
    ->setAccountId('87f8a782-1042-42')
    ->setCurrency('EUR')
    ->setDocumentPersonFront((new CoinsbankFileModel())->setAttachment($filename)->setAttachment_original($filenameOriginal)->setKey($filekey))
    ->setDocumentPersonBack((new CoinsbankFileModel())->setAttachment($filenameBack)->setAttachment_original($filenameOriginalBack)->setKey($filekeyBack))
    ->setFirstName('John')
    ->setLastName('Doe')
    ->setPayerAccount('Account')
    ->setCountryId(176);
$response = $depositApi->createDeposit($depositModelSEPA);
*/

/*
$depositModelQWI = (new CoinsbankDepositModel())
    ->setPaymentSystem('QWI')
    ->setAmount(500)
    ->setAccountId('87f8a782-1042-42')
    ->setCurrency('EUR')
    ->setAddress('');
$response = $depositApi->createDeposit($depositModelQWI);
*/
//---DEPOSIT>

//<---TRADE
//$tradeApi = new CoinsbankTrade($contextAuthorized);
//$tradeFilter = (new CoinsbankTradeFilter())->setStatus(1);//or array('status' => 1)
//$response = $api->getOrders(0, 50, $tradeFilter, false);
//$response = $api->createNewOrder('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, 711.86613, 676.2728, 747.4594);
//$response = $api->getOrder('30c38325-e550-4b');
//$response = $api->cancelOrder('17e9149d-7da5-40');
//$response = $api->updateOrder('30c38325-e550-4b', CoinsbankTrade::ACTION_RESET_SL);
//$response = $api->orderHistory('30c38325-e550-4b');
//$response = $api->getFeeData('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, CoinsbankTrade::DIRECTION_BUY, 711.86613, 676.2728, 747.4594);
//---TRADE>

//<---WITHDRAWAL
//$withdrawalApi = new CoinsbankWithdrawal($contextAuthorized);
//$response = $withdrawalApi->getAvailable('87f8a782-1042-42');
//$response = $withdrawalApi->getFee(100, 'EUR', 'SEP', '68265f8b-9569-4a', 0);
//$response = $withdrawalApi->getFee(100, 'BTC', 'CBI', '68265f8b-9569-4a', 0, '3cd81170-97cf-4b');//transfer to self with exchange
/*
$withdrawalModelWRT = (new CoinsbankWithdrawalModel())
    ->setPaymentSystem('WRT')
    ->setAmount(10000)
    ->setAccountId('b588bca5-81ad-41')
    ->setCurrency('RUB')
    ->setBankName('Some bank')
    ->setBeneficiaryAddress('Address')
    ->setBeneficiaryName('John Doe')
    ->setComment('Just withdrawal')
    ->setIban('SWIFTCODE')
    ->setSwift('12345678')
    ->setUrgent(1);
$response = $withdrawalApi->createWithdrawal($withdrawalModelWRT);
*/
//$response = $withdrawalApi->cancelWithdrawal('3737e9e4-8d20-49');

/*
$withdrawalModelGift = (new CoinsbankWithdrawalModel())
    ->setPaymentSystem('CBE')
    ->setAddress('email@example.test')
    ->setAmount(100)
    ->setAccountId('68265f8b-9569-4a')
    ->setCurrency('EUR')
    ->setComment('Just gift');
$response = $withdrawalApi->createWithdrawal($withdrawalModelGift);
*/
//$response = $withdrawalApi->activateGift('bvSqL8tnuu4yEiiCnxiYyTn3A7ZMnZ5Q');
//$response = $withdrawalApi->cancelTransfer('738f1489-6839-4f');
/*
$withdrawalModelExchange = (new CoinsbankWithdrawalModel())
    ->setPaymentSystem('CBI')
    ->setAddress('3cd81170-97cf-4b')
    ->setAmount(100)
    ->setAccountId('68265f8b-9569-4a')
    ->setCurrency('EUR')
    ->setComment('Simple exchange');
$response = $withdrawalApi->createWithdrawal($withdrawalModelExchange);
*/
//--WITHDRAWAL>

//<---VERIFICATION
//$verificationApi = new CoinsbankVerification($contextAuthorized);
//$response = $verificationApi->getData();
//--VERIFICATION>

//<---OPERATION
/*
$operationApi = new CoinsbankOperation($contextAuthorized);
$filter = (new CoinsbankOperationFilter())
    ->setCurrency('EUR')
    ->setAccountId('68265f8b-9569-4a')
    ->setAmountFrom(100)
    ->setAmountTo(100)
    ->setIsActive(true)
    ->setStatus(CoinsbankPaymentStatus::STATUS_AWAITING_APPROVAL)
    //->setOperationType(CoinsbankOperationFilter::TYPE_SEND_TO_OTHERS)
    //->setUserComment('Some comment')
    ->setDateCreateFrom('2016-07-13')
    ->setDateCreateTo('2016-07-13')
   // ->setDateUpdateFrom('2016-07-13')
    //->setDateUpdateTo('2016-07-13')
    ;
$response = $operationApi->getData(0, 50, $filter, false);
*/
//--OPERATION>

//<---CARD OPERATION
/*
$operationApi = new CoinsbankOperation($contextAuthorized);
$filter = (new CoinsbankCardOperationFilter())
    ->setAmountFrom(5)
    ->setAmountTo(5)
    ->setCreatedFrom('2016-05-03')
    ->setCreatedTo('2016-05-03')
    ->setMerchant('some merchant');
$response = $operationApi->getCardData('b7e22e9c-5e38-4b', 0, 50, $filter, false);
*/
//--CARD OPERATION>

//<---TRANSACTION
/*
$transactionApi = new CoinsbankTransaction($contextAuthorized);
$filter = (new CoinsbankTransactionFilter())
    ->setCurrency('USD')
    ->setAccountId('c4b734b3-befb-47')
    ->setAmountFrom(2)
    ->setAmountTo(2)
    ->setTransactionTypeGroup(CoinsbankTransactionType::TYPE_GROUP_CARDS)
   // ->setTransactionType(CoinsbankTransactionType::TYPE_CARD_PROCESS)
    ->setCard(true)
    ->setCardUniqueId('57a4d1ff-d107-49')
    ->setDateCreateFrom('2016-03-23')
    ->setDateCreateTo('2016-03-23')
;
$response = $transactionApi->getData(0, 50, $filter, false);
*/
//--TRANSACTION>

//<---FREEZE
//$freezeApi = new CoinsbankFreeze($contextAuthorized);
//$response = $freezeApi->getData();
//--FREEZE>

//<---MERCHANT
//$merchantApi = new CoinsbankMerchant($contextAuthorized);
//$response = $merchantApi->getMerchantServiceStatus();
//$response = $merchantApi->activateMerchantService();
//$response = $merchantApi->getFee(100, 'EUR');
/*
$invoice = (new CoinsbankMerchantInvoiceModel())
    ->setAmount(101)
    ->setCurrency('EUR')
    ->setBuyerEmail('email@example.tst')
    ->setBuyerPhone('34694470701')
    ->setCommissionType(CoinsbankMerchantInvoiceModel::COMMISSION_TYPE_MERCHANT)
    ->setCurrencyWish('BTC')
    ->setMerchantNumber('276967')
    ->setServiceDescription('Description')
    ->setServiceName('Service Name')
    ->setTtl(60 * 60 * 24 * 30)// 1 month
    ->setCustomerAddress('Customer Address')
    ->setCustomerCity('City')
    ->setCustomerCountry('Country')
    ->setCustomerFullName('Full Name')
    ->setCustomerRegion('Region')
    ->setCustomerZip('ZIP');
$response = $merchantApi->createInvoice($invoice);
*/
//$response = $merchantApi->cancelInvoice('de2b6714-f233-4e');
/*
$filter = (new CoinsbankMerchantFilter())
    ->setAmountFrom(1)
    ->setAmountTo(3)
    ->setCurrency('USD')
    ->setCaption('Pay in LTC')
    ->setDateCreatedFrom('2016-06-07')
    ->setDateCreatedTo('2016-06-07')
    ->setEmail('')
    ->setPhone('')
    ->setUniqueId('e0578788-9fdb-4a')
    ->setStatus(CoinsbankMerchantStatus::STATUS_CANCELLED);
$response = $merchantApi->getData(0, 50, $filter, false);
*/
//$response = $merchantApi->getInvoiceData('b42bff7e-b0cf-42');
//$merchantPaymentApi = new CoinsbankMerchantPayment($contextUnauthorized);
//$response = $merchantPaymentApi->getInvoiceData('b42bff7e-b0cf-42');
/*
$invoiceData = (new CoinsbankMerchantPaymentModel())
    ->setPayInCurrency('BTC')
    ->setCustomerAddress('Customer Address2')
    ->setCustomerCity('City2')
    ->setCustomerCountry('Country2')
    ->setCustomerFullName('Full Name2')
    ->setCustomerRegion('Region2')
    ->setCustomerZip('ZIP2');
$response = $merchantPaymentApi->setInvoiceData('b42bff7e-b0cf-42', $invoiceData);
*/
//$merchantPaymentApiAuth = new CoinsbankMerchantPayment($contextAuthorized);
//$response = $merchantPaymentApiAuth->payInvoiceByTransfer('b42bff7e-b0cf-42', '6425e91b-7bf2-48');
//$response = $merchantApi->forceInvoiceClose('d8cbc0bd-307e-4e', 'BTC');
//--MERCHANT>


var_dump($response->getHttpResponseCode());
//file_put_contents('picture.jpeg', $response->getBody()); //e.g. for picture
var_dump($response->getBodyDecoded());