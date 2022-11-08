<?php
session_start();
require_once("../db2-connect.php");

if(!isset($_POST["account"])){
    echo "請循正常管道進入";
    exit;
}

$account=$_POST["account"];
$password=$_POST["password"];
$password=md5($password);

// echo "$account, $password";

$sql="SELECT * FROM sellers WHERE account='$account' AND password='$password'";

$result=$conn->query($sql);
$sellerCount=$result->num_rows;

if($sellerCount>0){
    $row=$result->fetch_assoc();
    unset($_SESSION["error"]);
     //登入成功後，把錯誤訊息刪掉
    $_SESSION["seller"]=[
        "account"=>$row["account"],
        "name"=>$row["name"],
        "email"=>$row["email"]
    ];
    // var_dump($_SESSION["user"]);
    // 把資料存入["user"]
    header("location: dashboard.php");
}else{
    //echo"登入失敗，請確認帳號或密碼"; //後端
    if(!isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]=1;
    }else{
        $_SESSION["error"]["times"]++;
    }
    // $_SESSION["error"]["times"]=1;
    $_SESSION["error"]["message"]="登入失敗，請確認帳號或密碼";
    // echo $_SESSION["error"];
    header("location: login.php");
}
