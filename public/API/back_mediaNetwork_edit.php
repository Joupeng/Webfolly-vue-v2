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


$data = json_decode(file_get_contents("php://input"), true);
if (isset($data)) {
  // print_r($data);
  // 要給id
  $id = $data["id"];
  $title = $data["title"];
  $content = $data["content"];
  $link = $data["link"];
  $picture = $data["picture"];

  // 加上新增內容sql語法
  //根據id去定義欄位修改
  $sql = "UPDATE f website_link SET 
  ID = :id,
  `NAME` = :title,
 `DESCRIPTION` = :content,
  LINK = :link,
  PICTURE = :picture,
    WHERE ID = :id";

  // //要資料庫相對應的欄位
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":LINK_NAME", $title);
  $stmt->bindValue(":LINK_DESCRIPTION", $content);
  $stmt->bindValue(":LINK_LINK", $link);
  $stmt->bindValue(":LINK_IMAGE", $picture);
    // 執行編輯
  $stmt->execute();

  // 編輯一筆資料一定大於0
  if ($stmt->rowCount() > 0) {
    // 編輯成功
    $respBody["success"] = true;
    $respBody["message"] = " 編輯成功";
  } else {

    $respBody["success"] = false;
    $respBody["message"] = "編輯失敗";
  }

  // $respBody["data"] = $data;

  echo json_encode($respBody);
}
?>