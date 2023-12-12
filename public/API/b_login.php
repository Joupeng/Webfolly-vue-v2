<?php
include("./DBconnect.php");

$sql = "SELECT * FROM admin";

$statement = $pdo->prepare($sql);
$statement ->execute();
$data =$statement ->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($data);

?>






