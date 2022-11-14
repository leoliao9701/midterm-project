<?php
require_once("../db2-connect.php");

$id = $_GET["id"];

if (!isset($_GET["id"])) {
  echo "訂單不存在";
  exit;
}
$sql = "SELECT user_order.*, users.account, product.price, product.name AS product_id FROM user_order
JOIN users ON user_order.user_id = users.id
JOIN product ON user_order.product_id = product.id

WHERE user_order.id=$id
ORDER BY user_order.id DESC";

$result = $conn->query($sql);
// $productCount = $result->num_rows;
$row = $result->fetch_assoc();


?>
<!doctype html>
<html lang="en">

<head>
  <title>Order Detail</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
        body{
            height: 300vh;
        }
        :root{
            --side-width: 260px;
        }
        .container{
          width:80%;
          height:auto;
          position:relative;
          top:80px;
          left:160px;
        }

        .main-nav .form-control{
            background: #444;
            border: none;
            color: #fff;
            border-radius: 0;
        }
        .main-nav .btn{
            border-radius: 0;
        }
        .nav a{
            color: gray;
        }
        .nav a:hover, .nav a.active{
            color: white;
        }
        .logo{
            width: var(--side-width);
        }
        .left-aside{
            width: var(--side-width);
            height: 100vh; 
            padding-top: 54px;
            overflow: auto;
        }
        .aside-menu ul a{
            display: block;
            color:  #666;
            text-decoration: none;
            display: flex;
            justify-content: center;
            margin: 15px;
        }
        .aside-menu a:hover, .aside-menu li.active a{
            color: white;
            background: cadetblue;
            border-radius: 0.375rem;

        }
        .aside-menu a i{
            margin-right: 8px;
            margin-top: 4px;
        }
        .aside-subtitle{
            font-size: 14px;
        }
        .main-content{
            margin-left: calc(var(--side-width) + 20px);
            padding-top: 54px;
        }
    </style>
</head>

<body>
  <main>
  <nav class="main-nav d-flex bg-dark fixed-top shadow">
    <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-4 text" href="">藝拍</a>
    <div class="nav">
      <a class="nav-link" aria-current="page" href="../seller/dashboard.php">首頁</a>
      <a class="nav-link" href="../seller/seller-product-list.php">我的藝術品</a>
      <a class="nav-link" href="../seller/sellers.php">畫家</a>
      <!-- <a class="nav-link active" href="../user/dashboard.php">會員</a> -->
      <!--<a class="nav-link" href="../product/order-list.php">訂單</a>-->
      <a class="nav-link" href="#">展覽空間</a>
    </div>
    <div class="position-absolute top-0 end-0">
    <a class="btn btn-dark text-nowrap" href="#">進入前台頁面</a>
      <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
    </div>
  </nav>
  <aside class="left-aside position-fixed bg-dark border-end">
    <nav class="aside-menu">
      <!-- <div class="pt-2 px-3 pb-2 d-flex justify-content-center text-white">
        Welcome <?=$_SESSION["seller"]["account"]?> !
      </div> -->
      <ul class="list-unstyled">
        <a href="#" class=" align-items-center link-dark text-decoration-none ">
          <img src="https://github.com/mdo.png" alt="" width="110" height="110" class="rounded-circle mx-auto">
          <!--<strong>mdo</strong>-->
        </a>
          <h1 class="py-1 d-flex justify-content-center text-white">會員</h1>
          <hr class="text-white">
            <li ><a href="../seller/sellers.php" class="px-3 py-2"> <i class="fa-solid fa-user fa-fw"></i>編輯個人頁面</a></li>
            <li><a href="../seller/file-upload.php" class="px-3 py-2"><i class="fa-solid fa-heart"></i>賣家藝術品上傳</a></li>      
            <li><a href="../seller/seller.php?id=<?=$_SESSION["seller"]["id"]?>" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>         
            <li class="active"><a href="../seller/order-list.php" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>訂單管理</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
      </ul>
    </nav>
  </aside>
          <!-- <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/images/1.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>about us</strong>
            </a> -->
            <!-- <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul> -->
          </div> 
        </div>
      </div>
        <div class="container">
          <h1>商品詳情</h1>
          <table class="table">
            <tr>
              <th>id</th>
              <td><?= $row["id"] ?></td>
            </tr>
            <tr>
              <th>訂購日期</th>
              <td><?= $row["order_date"] ?></td>
            </tr>
            <tr>
              <th>訂購者</th>
              <td><?= $row["account"] ?></td>
            </tr>
            <tr>
              <th>品名</th>
              <td><?= $row["product_id"] ?></td>
            </tr>
            <tr>
              <th>單價</th>
              <td><?= $row["price"] ?></td>
            </tr>
            <tr>
              <th>數量</th>
              <td><?= $row["amount"] ?></td>
            </tr>
            <tr>
              <th>總價</th>
              <td><?= $row["price"] * $row["amount"] ?></td>
            </tr>
          </table>
          <div class="py-2">
            <a class="btn btn-info" href="order-list.php">Back</a>
          </div>
        </div>
      </div>
  </main>
  <!-- <footer class="footer">
        <div class="container-fruid d-flex justify-content-center">
            <div class="menu list-unstyled inline-flex">

                <a href="#" class="text-decoration-none text-white-50 px-2">關於 藝拍</a>

                <a href="#" class="text-decoration-none text-white-50 px-2">隱私權政策</a>

                <a href="#" class="text-decoration-none text-white-50 px-2">聯絡我們</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="menu list-unstyled inline-flex py-2">
                <a href="" class="text-decoration-none text-white-50">E𝝅 © All Rights Reserved.</a>
            </div>
        </div>
    </footer> -->
</body>
</html>