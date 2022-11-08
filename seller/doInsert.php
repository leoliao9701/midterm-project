<?php
require_once("../db2-connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入本頁";
    exit;
}


// 接收新增的資料
$account=$_POST["account"];
$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
// date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');

// echo "$name, $phone, $email, $now";

$sql="INSERT INTO sellers (account, name, phone, email, created_at, valid)
VALUES ('$account','$name', '$phone', '$email', '$now', 1)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;  //抓id
    echo "新增資料完成 id: $last_id";  //顯示id
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

header("location: sellers.php");  //跳回原來頁面