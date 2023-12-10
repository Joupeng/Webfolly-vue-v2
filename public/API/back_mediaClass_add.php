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

// 收前端的東西
// 使用$_POST
$data = $_POST;
//一般資訊的內容傳進來
// print_r($_POST);
// 檔案類型傳入
// print_r($_FILES['file']);
$title = $_POST["title"];
$source = $_POST["source"];
$content = $_POST["content"];
$link = $_POST["link"];

if ($_FILES["file"]["error"] > 0) {
  echo "上傳失敗: 錯誤代碼" . $_FILES["file"]["error"];
} else {
  // 取得$_POST的其他字句


  //取得上傳的檔案資訊=======================================
  $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名        
  $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
  $fileType = $_FILES["file"]["type"];    //檔案種類        
  $fileSize = $_FILES["file"]["size"];    //檔案尺寸
  //=======================================================

  //Web根目錄真實路徑
  //電腦會自動偵測，因為不同作業系統根目錄不同
  // $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
  $RelativePath = "/assets/medialiteracy/";

  //檔案最終存放位置
  //$fileName改名可以使用時間搓記
  // $filePath = $ServerRoot . "/medialiteracy/" . $fileName;
  $filePath = $RelativePath . $fileName;


  //將暫存檔搬移到正確位置
  // 從$filePath_Temp(Server上的暫存檔路徑含檔名)搬到$filePath
  move_uploaded_file($filePath_Temp, $filePath);

  //顯示檔案資訊
  echo "檔案存放位置：" . $filePath;
  echo "<br/>";
  echo "類型：" . $fileType;
  echo "<br/>";
  echo "大小：" . $fileSize;
  echo "<br/>";
  echo "副檔名：" . getExtensionName($filePath);
  echo "<br/>";
  echo "<img src='/FileUpload/" . $fileName . "'/>";
}

//取得檔案副檔名
function getExtensionName($filePath)
{
  $path_parts = pathinfo($filePath);
  return $path_parts["extension"];
}

$sql = "INSERT INTO lecture_link(TITLE,SOURCE,DIRECTION,LINKS,PHOTO)
value(:title,:source,:content,:link,:picture)";


// 加上新增內容sql語法
// $sql = "INSERT INTO lecture_link(TITLE,SOURCE,DIRECTION,LINKS,PHOTO)
// value(:title,:source,:content,:link,:picture)";

// //要加入資料庫相對應的欄位
$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(":title", $title);
$pstmt->bindValue(":source", $source);
$pstmt->bindValue(":content", $content);
$pstmt->bindValue(":link", $link);
// 我要的是圖片路徑
$pstmt->bindValue(":picture", $filePath);
$pstmt->execute();
// // 這是錯誤的嗎？
$id = $pdo->lastInsertId();



$respbody["success"] = true;
$respbody["message"] = "新增成功";
$respbody["id"] = "$id";
$respbody["filePath"] = "$filePath";



//   echo json_encode($respBody);
// } else {

//   $respbody["success"] = false;
//   $respbody["message"] = "缺少必要的參數";

echo json_encode($respbody);
// }

header('Content-Type: application/json');
echo json_encode($respbody, JSON_UNESCAPED_UNICODE);
