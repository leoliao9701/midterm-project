<?php
require_once("../db2-connect.php");

//註冊頁面
$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

if(empty($name)){
    echo "請輸入姓名";
    exit;
}
if(empty($phone)){
    echo "請輸入手機號碼";
    exit;
}
if(empty($email)){ 
    echo "請輸入E-mail";
    exit;
}

if(empty($account)){
    echo "請輸入帳號";
    exit;
}
$accountLength=strlen($account);
if($accountLength<4 || $accountLength>20){
    echo "請輸入4~20字元長度帳號";
    exit;
}
if(empty($password)){  
    echo "請輸入密碼";
    exit;
}

if($password != $repassword){  //不等於
    echo"密碼前後不一致";
    exit;
}

$sql="SELECT * FROM users WHERE account='$account'";
//先確認是否帳號已存在
$result = $conn->query($sql);
$userCount=$result->num_rows;

if($userCount>0){
    echo "該帳號已經存在";
    exit;
}
$password=md5($password); 
//舊的加密方式 建議不要用 太容易破解

$now=date('Y-m-d H:i:s');
$sqlCreate="INSERT INTO users (name, phone, email, account, password, created_at, valid)
VALUES ('$name','$phone','$email','$account', '$password', '$now', 1)";



if ($conn->query($sqlCreate) === TRUE) {
    $last_id = $conn->insert_id;  //抓id
    echo "新增資料完成 id: $last_id";  //顯示id
} else {
    echo "新增資料錯誤: " . $conn->error;
}


$conn->close();

header("location: users.php");

?>
