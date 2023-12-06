<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// header('Content-Type: application/json');

// //  取得 HTTP POST  Client 端所傳送過來的原始資料
//  $postData = file_get_contents("php://input");
//  //將 JSON 格式的資料轉換成 PHP 陣列或物件形式的函式
//  $data = json_decode($postData, true);
//  $TotalAmount = $_POST['TotalAmount']


use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require __DIR__ . '/vendor/autoload.php';

$factory = new Factory([
    'hashKey' => 'pwFHCqoQZGmho4w6',
    'hashIv' => 'EkRm7iFT261dpevs',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

$input = [
    'MerchantID' => '3002607',
    'MerchantTradeNo' => 'Test' . time(),
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType' => 'aio',
    'TotalAmount' => 500,
    'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
    'ItemName' => '捐款金額: NTD $500',
    'ChoosePayment' => 'Credit',
    'EncryptType' => 1,

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL' => 'https://tibamef2e.com/thd103/g1/dist/?category=#/donate_finish',
    'OrderResultURL' => 'https://tibamef2e.com/thd103/g1/dist/?category=#/donate_finish',
    
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

echo $autoSubmitFormService->generate($input, $action);

exit;
?>