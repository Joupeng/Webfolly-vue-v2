<?php
include("DBconnect.php");

$title = $_POST["title"];
$source = $_POST["source"];
$content = $_POST["content"];
$link = $_POST["link"];

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

$sql = "
    insert into lecture_link(TITLE, SOURCE, DIRECTION, LINKS, PHOTO)
    values(:title, :source, :content, :link, :picture)
";

// //要加入資料庫相對應的欄位
$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(":title", $title);
$pstmt->bindValue(":source", $source);
$pstmt->bindValue(":content", $content);
$pstmt->bindValue(":link", $link);
// 我要的是圖片路徑
$pstmt->bindValue(":picture", "assets/medialiteracy/" . $fileName);
$pstmt->execute();
// // 這是錯誤的嗎？
$id = $pdo->lastInsertId();

$respbody["success"] = true;
$respbody["message"] = "新增成功";
$respbody["id"] = "$id";
$respbody["filePath"] = "$filePath";

echo json_encode($respbody);

header('Content-Type: application/json');
echo json_encode($respbody, JSON_UNESCAPED_UNICODE);
