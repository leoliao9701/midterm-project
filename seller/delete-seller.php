<?php
//軟刪除 soft delete
require_once("../db2-connect.php");

$id=$_GET["id"];
// $sql="DELETE FROM users WHERE id='$id'";
$sql="UPDATE sellers SET valid=0 WHERE id='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location: sellers.php");
} else {
    echo "刪除資料錯誤: " . $conn->error;
}