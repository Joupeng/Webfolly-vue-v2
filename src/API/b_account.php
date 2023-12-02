<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// header('Content-Type: application/json');

 //取得 HTTP POST  Client 端所傳送過來的原始資料
 $postData = file_get_contents("php://input");
 //將 JSON 格式的資料轉換成 PHP 陣列或物件形式的函式
 $data = json_decode($postData, true);

// 設定變數


// =============取消非同源 連接資料庫
include("./DBconnect.php");
// =============取消非同源 連接資料庫


$sql = "SELECT * FROM admin";

$statement = $pdo->prepare($sql);
$statement ->execute();
$data =$statement ->fetchAll(PDO::FETCH_ASSOC);


// $admin_data=array();

echo json_encode($data);




?>
