<?php
include("DBconnect.php");
// // 允許不同源
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");

// // 連自己的資料庫
// $db_host = "127.0.0.1";
// $db_user = "root";
// $db_pass = "password";
// // 資料庫的名稱
// $db_select = "webfolly";
// //建立資料庫連線物件
// $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_select . ";charset=utf8";
// // 建立PDO物件
// $pdo = new PDO($dsn, $db_user, $db_pass);

// $data = $_POST;

// 要給id
$id = $_POST["id"];
$title = $_POST["title"];
$source = $_POST["source"];
$content = $_POST["content"];
$link  = $_POST["link"];
// $picture = $_FILES["picture"];
if ($_FILES["file"]["error"] > 0) {
  echo "上傳失敗: 錯誤代碼" . $_FILES["file"]["error"];
} else {
  //取得上傳的檔案資訊=======================================
  $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名
  $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名
  $fileType = $_FILES["file"]["type"];    //檔案種類
  $fileSize = $_FILES["file"]["size"];    //檔案尺寸

  //Web根目錄真實路徑
  //電腦會自動偵測，因為不同作業系統根目錄不同
  $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
  $RelativePath = "/assets/medialiteracy/";

  //檔案最終存放位置
  //$fileName改名可以使用時間搓記
  // $filePath = $ServerRoot . "/medialiteracy/" . $fileName;
  // $filePath = $RelativePath . $fileName;
  $filePath = $ServerRoot . "/thd103/g1/dist/assets/medialiteracy/" . $fileName;

  //將暫存檔搬移到正確位置
  // 從$filePath_Temp(Server上的暫存檔路徑含檔名)搬到$filePath
  move_uploaded_file($filePath_Temp, $filePath);

  //顯示檔案資訊
  // echo "檔案存放位置：" . $filePath;
  // echo "<br/>";
  // echo "類型：" . $fileType;
  // echo "<br/>";
  // echo "大小：" . $fileSize;
  // echo "<br/>";
  // echo "副檔名：" . getExtensionName($filePath);
  // echo "<br/>";
  // echo "<img src='/FileUpload/" . $fileName . "'/>";
}

//取得檔案副檔名
function getExtensionName($filePath)
{
  $path_parts = pathinfo($filePath);
  return $path_parts["extension"];
}



// 加上新增內容sql語法
//根據id去定義欄位修改
//左邊是資料庫欄位名稱，右邊對應.vue檔丟過來的
$sql = "UPDATE lecture_link SET 
  TITLE = :title,
  SOURCE = :source,
  DIRECTION = :content,
  LINKS = :link,
  PHOTO = :picture
  WHERE ID = :id";

// //要資料庫相對應的欄位
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->bindValue(":title", $title);
$stmt->bindValue(":source", $source);
$stmt->bindValue(":content", $content);
$stmt->bindValue(":link", $link);
// 這裡需要更改
$stmt->bindValue(":picture", "assets/medialiteracy/" . $fileName);
// 執行編輯
$stmt->execute();

// 編輯一筆資料一定大於0
if ($stmt->rowCount() > 0) {
  // 編輯成功
  $respbody["success"] = true;
  $respbody["message"] = " 編輯成功";
  $respbody["filePath"] = "$filePath";
} else {

  $respbody["success"] = false;
  $respbody["message"] = "編輯失敗";
}


echo json_encode($respbody);
header('Content-Type: application/json');
