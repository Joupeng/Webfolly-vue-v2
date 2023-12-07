<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
require __DIR__ . '/vendor/autoload.php';

$factory = new Factory([
    'hashKey' => 'pwFHCqoQZGmho4w6',
    'hashIv' => 'EkRm7iFT261dpevs',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

$TotalAmount = '2000';
$ItemName = '單筆捐款-捐款金額2000元';

$input = [
    'MerchantID' => '3002607',
    'MerchantTradeNo' => 'Test' . time(),
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType' => 'aio',
    'TotalAmount' => $TotalAmount,
    'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
    'ItemName' => $ItemName,
    'ChoosePayment' => 'Credit',
    'EncryptType' => 1,

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL' => 'https://tibamef2e.com/thd103/g1/dist/?category=#/donate_finish',
    'OrderResultURL' => 'https://tibamef2e.com/thd103/g1/dist/?category=#/donate_finish',
    
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

echo $autoSubmitFormService->generate($input, $action);

// exit;
// }
?>