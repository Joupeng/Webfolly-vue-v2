<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");
// =============取消非同源 連接資料庫
include("./DBconnect.php");

$sql = "SELECT * FROM admin";

$statement = $pdo->prepare($sql);
// $pstmt->bindValue(":xxx",'username');
// $pstmt->bindValue(":xxx",$username);
// // $pstmt->bindValue(":yyy",'password');
// $pstmt->bindValue(":yyy",$password);
$statement ->execute();
$data =$statement ->fetchAll(PDO::FETCH_ASSOC);

// if(count($memberList) !=0 ){
//   $respBody["success"] = true;
//   $respBody["message"] ="登入成功";
//   // NICKNAME資料庫的名稱是大寫
//   // $respBody["nickname"] =$memberList[0]["NICKNAME"];
// }else{
//   $respBody["success"] = false;
//   $respBody["message"] = "登入失敗";
// }

header('Content-Type: application/json');
echo json_encode($data);
// $data = array("Volvo", "BMW", "Toyota");

// echo json_encode($data);

?>






