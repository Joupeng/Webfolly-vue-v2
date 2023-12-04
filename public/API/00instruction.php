使用說明
 
流程: 1.資料庫連線  2.存取資料   3.取消資料庫連線

1.資料庫連線
本機端使用: localhost   *記得將密碼改成自己的

連線方式如下==============
 在php檔開頭加入 

  "include("./DBconnect.php");"
  =======================
  
2.取用資料
接收前端傳來的json格式=============
// $pdo->exec('');

$data = json_decode(file_get_contents("php://input"), true); 

取得資料庫傳來的資料=============
//選取SQL的方式
       $sql = "SELECT * FROM 表格名 WHERE 欄位值 = '王小明'";


//選取資料
$statement = $pdo->query($sql);

//抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();
//封裝成JSON檔
    echo json_encode($data);

    3.關閉資料庫連線
關閉方式如下============
(有時間再來寫 XD)