<?php
include("DBconnect.php");
// // 允許不同源
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// 連自己的資料庫
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "password";
// // 資料庫的名稱
// $db_select = "webfolly";
// //建立資料庫連線物件
// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select . ";charset=utf8";
// // 建立PDO物件
// $pdo = new PDO($dsn, $db_user, $db_pass);

// 設定再資料庫新增的題目根據後新增進行排序ORDER BY id DESC
$sql = "SELECT * FROM lecture_link ORDER BY id DESC";
//執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
$statement = $pdo->prepare($sql);
// 執行實際查詢，才會有資料回來
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// 將資料以 JSON 格式返回
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
