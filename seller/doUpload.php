<?php
require_once("../db2-connect.php");

if(!isset($_POST["name"])){
    echo "請尋正常管道進入本頁";
    exit;
}
$name=$_POST["name"];
$category=$_POST["category"];
$price=$_POST["price"];
$amount=$_POST["amount"];
$author=$_POST["author"];
$detailed=$_POST["detailed"];
$sell_id=$_POST["sell_id"];



if($_FILES["myFile"]["error"]==0){
    if(move_uploaded_file($_FILES["myFile"]["tmp_name"], "../upload/".$_FILES["myFile"]["name"])){
        echo "upload success!<br>";
        $now=date('Y-m-d H:i:s');
        
        $fileName=$_FILES["myFile"]["name"];
        
        // var_dump ($category);

        // exit;
        $sql="INSERT INTO product (name, category, price, amount, create_time, author, images, detailed, sell_id) VALUES ('$name','$category','$price','$amount','$now','$author','$fileName','$detailed','$sell_id')";
        if($conn->query($sql)===TRUE){
            $last_id=$conn->insert_id;
            echo "新增資料成功 ,id: $last_id";
            // header("location:file-uploade.php");
        }else{
            echo "新增資料錯誤";
            $conn->error;
        }
    }else{
        echo "uploade fail!<br>";
    }
}
// var_dump($category);
?>
<!doctype html>
<html lang="en">

<head>
  <title>doUpload</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <a class="btn btn-info" href="./file-upload.php">返回</a>


</body>

</html>