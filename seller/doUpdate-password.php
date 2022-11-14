<?php
require_once("../db2-connect.php");
//更改資料
if(!isset($_POST["name"])){
    echo "請循正常管道進入本頁";
    exit;
}

$id=$_POST["id"];
$name=$_POST["name"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

// echo "$id, $name, $password";
// exit;

if($password != $repassword){  //不等於
    echo"密碼前後不一致";
    exit;
}

$password=md5($password);
// echo "$password";

$sql="UPDATE sellers SET password='$password' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";

    
} else {
    echo "更新資料錯誤: " . $conn->error;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
header("location: seller.php?id=".$id);
?>
</body>
</html>
