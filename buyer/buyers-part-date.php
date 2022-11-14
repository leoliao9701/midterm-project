<?php
require_once("../db2-connect.php");

$sql="SELECT id, name FROM users";//決定撈出哪些資料
$result=$conn->query($sql);
$userCount=$result->num_rows;

$rows=$result->fetch_all(MYSQLI_ASSOC);  //關聯式陣列
// $rows2=$result->fetch_all(MYSQLI_NUM);

var_dump($rows);

?>

