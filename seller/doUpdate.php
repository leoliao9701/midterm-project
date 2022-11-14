<?php
require_once("../db2-connect.php");
//更改資料
if(!isset($_POST["name"])){
    echo "請循正常管道進入本頁";
    exit;
}

$id=$_POST["id"];
$name=$_POST["name"];
$account=$_POST["account"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$introduce=$_POST["introduce"];
$social=$_POST["social"];
// $introduce=$_POST["introduce"];

// echo "$name, $phone, $email";

$sql="UPDATE sellers SET name='$name',account='$account',phone='$phone', email='$email',introduce='$introduce',social='$social' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    
} else {
    echo "更新資料錯誤: " . $conn->error;
}

header("location: edit-seller.php?id=".$id);


