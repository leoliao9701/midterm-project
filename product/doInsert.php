<?php
require_once("../db2-connect.php");

if(!isset($_POST["user_id"])){
    echo "請循正常管道進入本頁";
    exit;
}

$product_id=$_POST["product_id"];
$user_id=$_POST["user_id"];
$amount=$_POST["amount"];
$order_date=$_POST["order_date"];
// $payment=$_POST["payment"];
$send_address=$_POST["send_address"];
// $coupon_id=$_POST["coupon_id"];

//若無法取得區域時間使用以下代碼
// date_default_timezone_set("Asia/Taipei");
//取得目前時間
// $now=date('Y-m-d H:i:s');

// echo "$name, $phone, $email, $now";

$sql="INSERT INTO users_order (product_id, user_id, amount, order_date, payment, send_address)
-- , payment, coupon_id
VALUES ('$product_id', '$user_id', '$amount', '$order_date','$payment','$send_address')";
// ,'$payment','$coupon_id', '$now', 1
if ($conn->query($sql) === TRUE) {
    //抓id流水號
    $last_id = $conn->insert_id;
    echo "新增資料完成, id: $last_id";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

//新增完跳轉頁面
header("location: order-list.php");