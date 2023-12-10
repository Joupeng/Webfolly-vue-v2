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
// $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
// // 建立PDO物件
// $pdo = new PDO($dsn, $db_user, $db_pass);

// 收前端的東西
$data = json_decode(file_get_contents("php://input"), true);
// 印不出來
// print_r($data);
if (isset($data)) {
  $titleLeft = $data["titleLeft"];
  $resultLeft = $data["resultLeft"];
  $answerLeft = $data["answerLeft"];
  $titleRight = $data["titleRight"];
  $resultRight = $data["resultRight"];
  $answerRight = $data["answerRight"];
  $date = $data["date"];


  // 加上新增內容sql語法
  $sql = "INSERT INTO fake_message_game(LTEXT,RTEXT,ANSWER_LEFT,DESCRIPTION_LEFT,ANSWER_RIGHT,DESCRIPTION_RIGHT,CREATE_DATE)
value(:titleLeft,:resultLeft,:answerLeft,:titleRight,:resultRight,:answerRight,:date)";

  //要加入資料庫相對應的欄位
  $pstmt = $pdo->prepare($sql);
  $pstmt->bindValue(":titleLeft", $titleLeft);
  $pstmt->bindValue(":resultLeft", $resultLeft);
  $pstmt->bindValue(":answerLeft", $answerLeft);
  $pstmt->bindValue(":titleRight", $titleRight);
  $pstmt->bindValue(":resultRight", $resultRight);
  $pstmt->bindValue(":answerRight", $answerRight);
  $pstmt->bindValue(":date", $date);
  $pstmt->execute();
  // 這是錯誤的嗎？
  $id = $pdo->lastInsertId();


  $respBody["success"] = true;
  $respBody["message"] = "新增成功";
  $respBody["id"] = "$id";



  echo json_encode($respBody);
} else {

  $respBody["success"] = false;
  $respBody["message"] = "缺少必要的參數";

  echo json_encode($respBody);
}
