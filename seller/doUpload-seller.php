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
$images=$_FILES["file0"];
// $imagesName=$_POST["imagesName"];
// echo $category;

if(empty($name or $category or $price or $amount or $author or $detailed or $sell_id)){
    echo "請輸入資料";
}elseif($_FILES["file0"]["error"]!=0){
    echo "請選擇照片";
}else{
    if($_FILES["file0"]["error"]==0){
        // echo $_FILES["file0"]["name"];
        if(move_uploaded_file($_FILES["file0"]["tmp_name"], "../product/images/".$_FILES["file0"]["name"])){
            echo "upload success!<br>";
            $now=date('Y-m-d H:i:s');
            
            $fileName=$_FILES["file0"]["name"];
            
            $sql="INSERT INTO product (name, category, price, amount, create_time, author, images, detailed, sell_id,product_status) VALUES ('$name','$category','$price','$amount','$now','$author','$fileName','$detailed','$sell_id',1)";
            if($conn->query($sql)===TRUE){
                $last_id=$conn->insert_id;
                echo "新增資料成功 ,id: $last_id";
                // header("location:file-uploade.php");
            }else{
                echo "新增資料錯誤";
                $conn->error;
                // echo $sql;
            }
        }else{
            echo "uploade fail!<br>";
            echo "請檢查是否有重複上傳";
        }
    }
}

// var_dump($category);
?>
<!doctype html>
<html lang="en">

<head>
  <title>doUpload-seller</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <a class="btn btn-dark" href="seller-product-list.php">返回商品清單</a>
    <a class="btn btn-dark" href="file-upload.php">返回新增商品</a>


</body>

</html>