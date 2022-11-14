<?php

if(!isset($_GET["id"])){
    echo "商品不存在";
    exit;
}

$id=$_GET["id"];

require_once("../db2-connect.php");

$sql="SELECT * FROM product WHERE id='$id' ";
$result=$conn->query($sql);
$userCount=$result->num_rows;

$row=$result->fetch_assoc();

// var_dump($row);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <title><?=$row["name"]?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="py-2">
        <a class="btn btn-dark" href="../user/products.php">回到商品列表</a>
    </div>
    <?php if($userCount==0): ?>
        商品不存在
    <?php else: ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>id</td>
                <td><?=$row["id"]?></td>
            </tr>
            <tr>
                <td>作品名稱</td>
                <td><?=$row["name"]?></td>
            </tr>
            <tr>
                <td>分類</td>                
                <td>
                <?php if($row["category"]=="1") {
                    echo "水墨";
                } elseif ($row["category"]=="2"){
                    echo "膠彩";
                }elseif ($row["category"]=="3"){
                    echo "油畫";
                }elseif ($row["category"]=="4"){
                    echo "水彩";
                }elseif ($row["category"]=="5"){
                    echo "版畫";
                }elseif ($row["category"]=="6"){
                    echo "電繪";
                }?>                
                </td>
              <?php  ?>
            </tr>
            <tr>
                <td>價錢</td>
                <td><?= $row["price"] ?></td>
            </tr>
            <tr>
                <td>數量</td>
                <td><?= $row["amount"] ?></td>
            </tr>
            <tr>
                <td>上傳時間</td>
                <td><?=$row["create_time"]?></td>
            </tr>
            <tr>
                <td>作者</td>
                <td><?= $row["author"] ?></td>
            </tr>
            <tr>
                <td>畫作</td>
                <td>
                    <img src="./images/<?= $row["images"] ?>" alt="" class="img-fluid">
                </td>
            </tr>
            <tr>
                <td>簡介</td>
                <td><?= $row["detailed"] ?></td>
            </tr>
            <tr>
                <td>賣家</td>
                <td><?= $row["sell_id"] ?></td>
            </tr>
        </tbody>
    </table>
    <div class="py-2">
        <a class="btn btn-dark" href="edit-product.php?id=<?=$row["id"]?>">編輯商品</a>
    </div>
    <?php endif; ?>
  </div>
</body>

</html>