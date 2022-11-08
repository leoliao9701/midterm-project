<?php
require_once("../db2-connect.php");

$id=$_GET["id"];
$sql="DELETE FROM `products` WHERE `products`.`id` ='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>delete-product</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<a href="./products.php"  class="btn btn-info">返回商品列表</div>
</body>

</html>

