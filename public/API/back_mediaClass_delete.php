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

// 要補寫一下收前端的訊號id值傳進來要刪的內容才刪掉，應該要取的正確的id值進行刪除
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data)) {
  // print_r($data);
  // 傳id來進行刪除欄位
  $id = $data["id"];


  // 加上新增內容sql語法
  // 冒號是綁定的標誌，這樣 PDO 才知道這是一個綁定的變數
  $sql = "DELETE FROM lecture_link WHERE ID=:id ";

  //要資料庫相對應的欄位
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":id", $id);
  // 執行刪除
  $stmt->execute();

  // 刪除一筆資料一定大於0
  if ($stmt->rowCount() > 0) {
    // 刪除成功
    $respBody["success"] = true;
    $respBody["message"] = " 刪除成功";
  } else {

    $respBody["success"] = false;
    $respBody["message"] = "刪除失敗";
  }
  echo json_encode($respBody);
}
