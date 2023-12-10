<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// header('Content-Type: application/json');
// header('Content-Type: text/plain');

 //取得 HTTP POST  Client 端所傳送過來的原始資料
$postData = file_get_contents("php://input");
//將 JSON 格式的資料轉換成 PHP 陣列或物件形式的函式
$data = json_decode($postData, true);

if ($data === null) {
 // 處理JSON解碼錯誤
 echo "JSON解碼錯誤";
 
}else{
  
$id=$data['DELid'];



include("./DBconnect.php");
// 連接資料庫
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "LEXI0630";
// $db_select = "webfolly";
// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
// $pdo = new PDO($dsn, $db_user, $db_pass);

$sql = "DELETE FROM `admin` WHERE `id` = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);

$stmt->execute();


 // 检查更新是否成功
 $affectedRows = $stmt->rowCount();
if($affectedRows > 0){
  echo "新增成功!";
}else{
  echo "新增失敗!";
}

}
?>
