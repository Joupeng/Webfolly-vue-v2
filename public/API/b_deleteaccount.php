<?php
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
