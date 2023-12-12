<?php
 //取得 HTTP POST  Client 端所傳送過來的原始資料
 $postData = file_get_contents("php://input");
 //將 JSON 格式的資料轉換成 PHP 陣列或物件形式的函式
 $data = json_decode($postData, true);

 if ($data === null) {
  // 處理JSON解碼錯誤
  echo "JSON解碼錯誤";

}else{

// 從解碼的數據中提取oldPWD和newPWD
$oldPWD = $data['oldPWD'];
$newPWD = $data['newPWD'];
echo json_encode(["success" => true]);

// =============取消非同源 連接資料庫
include("./DBconnect.php");

$sql="UPDATE `admin` SET `PASSWORD` = :newPWD WHERE `PASSWORD` =:oldPWD";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':newPWD', $newPWD);
$stmt->bindParam(':oldPWD', $oldPWD);
$stmt->execute();


 // 检查更新是否成功
 $affectedRows = $stmt->affected_rows;

 if ($affectedRows > 0) {
  echo json_encode(['success' => 'Password updated successfully']);
} else {
  echo json_encode(['error' => 'Password update failed']);
}


}

?>

