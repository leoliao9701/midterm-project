<?php
require_once("../db2-connect.php");

session_start();
if(!isset($_SESSION["seller"])){
  header("location:../seller/login.php");
}

if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $sql = "SELECT * FROM product WHERE `product`.`name` LIKE '%$search%'  ORDER BY `product`.`id` ASC";
  $result = $conn->query($sql);
  $userCount = $result->num_rows;
} else {
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = 1;
  }

  $sqlAll="SELECT * FROM `product` ORDER BY `product`.`id` ASC ";
  $resultAll = $conn->query($sqlAll);
  $userCount = $resultAll->num_rows;


  $per_page = 10;
  // $page=1;
  $page_start = ($page - 1) * $per_page;


  $sql = "SELECT * FROM `product` ORDER BY `product`.`create_time` DESC
  LIMIT $page_start, $per_page";



  $result = $conn->query($sql);

  //計算頁數
  $totalPage = ceil($userCount / $per_page);
}


$rows = $result->fetch_all(MYSQLI_ASSOC);


// var_dump($totalPage);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <title>Products</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    a{
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="py-2 d-flex justify-content-between ">
    <a class="btn btn-dark" href="../seller/dashboard.php">回首頁</a>
      <a class="btn btn-dark" href="../seller/file-upload.php">新增商品</a>
    </div>
    <div class="py-2">
      <form action="products.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search">
          <button type="submit" class="btn btn-dark">作品名稱搜尋</button>
        </div>
      </form>
    </div>
    <?php if (isset($_GET["search"])) : ?>
      <div class="py-2">
        <a class="btn btn-dark" href="products.php">回商品列表</a>
      </div>
      <h1><?= $_GET["search"] ?> 的搜尋結果</h1>
    <?php endif; ?>
    <div class="py-2">
      共 <?= $userCount ?> 張
    </div>
    <?php //var_dump($rows) 
    ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>id</th>
          <th>作品名稱</th>
          <th>分類</th>
          <th>價錢</th>
          <th>數量</th>
          <th>上傳時間</th>
          <th>作者</th>
          <th>畫作</th>
          <th>簡介</th>
          <th>賣家</th>
        </tr>
      </thead>
      <?php if ($userCount > 0) : ?>
        <tbody>
          <?php foreach ($rows as $row) : ?>
            <tr>
              <td><?= $row["id"] ?></td>
              <td><?= $row["name"] ?></td>
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
              <td><?= $row["price"] ?></td>
              <td><?= $row["amount"] ?></td>
              <td><?= $row["create_time"] ?></td>
              <td><?= $row["author"] ?></td>
              <td><?= $row["images"] ?></td>
              <td><?= $row["detailed"] ?></td>
              <td><a href="../seller/edit-seller.php?id=<?= $row["sell_id"] ?>"><?= $row["sell_id"] ?></a></td>
        <!-- <a class="btn btn-dark" href="edit-seller.php?id=<?=$row["id"]?>">編輯使用者</a> -->
              <td>
                <a class="btn btn-dark" href="product_page.php?id=<?= $row["id"] ?>">檢視</a>
                <a class="btn btn-danger" href="delete-product.php?id=<?= $row["id"] ?>">刪除</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      <?php endif; ?>
    </table>
    <?php if (!isset($_GET["search"])) : ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
            <li class="page-item 
            <?php
                if ($i == $page) echo "active";
            ?>">
            <a class="page-link" href="products.php?page=<?= $i ?>"><?= $i ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
    <?php endif; ?>
  </div>
</body>

</html>