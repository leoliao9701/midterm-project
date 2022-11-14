<?php
require_once("../db2-connect.php");

if (!isset($_POST["name"])) {
    echo "請尋正常管道進入本頁";
    exit;
}
$id = $_POST["id"];
$name = $_POST["name"];
$category = $_POST["category"];
$price = $_POST["price"];
$amount = $_POST["amount"];
$author = $_POST["author"];
$detailed = $_POST["detailed"];
$sell_id = $_POST["sell_id"];

$now = date('Y-m-d H:i:s');

if (empty($_FILES["images"]["tmp_name"])) {
    $sqlAll="SELECT * FROM `product` WHERE `id`='$id'";
    $resultImg=$conn->query($sqlAll);
    $rowImg=$resultImg->fetch_assoc();
    $imageName=$rowImg["images"];
    
    $sql = "UPDATE `product` SET `id`='$id',`name`='$name',`category`='$category',`price`='$price',`amount`='$amount',`create_time`='$now',`author`='$author',`images`='$imageName',`detailed`='$detailed',`sell_id`='$sell_id' WHERE `product`.`id` = '$id'";
    
} else {
    echo "0";
    if ($_FILES["images"]["error"] == 0) {
        // echo $_FILES["images"]["name"];
        if (move_uploaded_file($_FILES["images"]["tmp_name"], "../images" . $_FILES["images"]["name"])) {
            echo "upload success!<br>";
            $now = date('Y-m-d H:i:s');

            $imageName = $_FILES["images"]["name"];
            $sql = "UPDATE `product` SET `id`='$id',`name`='$name',`category`='$category',`price`='$price',`amount`='$amount',`create_time`='$now',`author`='$author',`images`='$imageName',`detailed`='$detailed',`sell_id`='$sell_id' WHERE `product`.`id` = '$id'";
        } else {
            echo "上傳圖片失敗!<br>";
            
        }
    }
}



// var_dump($sql);


if ($conn->query($sql) === TRUE) {
    echo "更新資料成功 ,id: $id";
} else {
    echo "更新資料錯誤,id: $id";
    $conn->error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <a class="btn btn-dark" href="product_page.php?id=<?= $id ?>">檢視</a>


</body>

</html>