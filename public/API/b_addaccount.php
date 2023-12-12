<?php
 //取得 HTTP POST  Client 端所傳送過來的原始資料
$postData = file_get_contents("php://input");
//將 JSON 格式的資料轉換成 PHP 陣列或物件形式的函式
$data = json_decode($postData, true);

// =============取消非同源 連接資料庫
include("./DBconnect.php");

if ($data === null) {
 // 處理JSON解碼錯誤
 echo "JSON解碼錯誤";
 
}else{
  
$id=$data['id'];
$NAME=$data['NAME'];
$PERMISSION=$data['PERMISSION'];
$PASSWORD=$data['PASSWORD'];
$MAIL=$data['MAIL'];
$PHONE=$data['PHONE'];

include("./DBconnect.php");

$sql="INSERT INTO `admin`(`id`, `NAME`, `PERMISSION`, `PASSWORD`, `MAIL`, `PHONE`) VALUES
(:adminID, :adminNAME, :PERMISSION, :PWD, :MAIL, :PHONE)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':adminID', $id);
$stmt->bindParam(':adminNAME', $NAME);
$stmt->bindParam(':PERMISSION', $PERMISSION);
$stmt->bindParam(':PWD', $PASSWORD);
$stmt->bindParam(':MAIL', $MAIL);
$stmt->bindParam(':PHONE', $PHONE);
$stmt->execute();


 // 检查更新是否成功
 $affectedRows = $stmt->rowCount();
if($affectedRows > 0){
  echo "更新成功!";
}else{
  echo "更新失敗!";
}

}
?>
