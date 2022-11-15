<?php
session_start();

if(!isset($_GET["id"])){
    echo "使用者不存在";
    exit;
}

$id=$_GET["id"];


require_once("../db2-connect.php");

$sql="SELECT * FROM sellers WHERE id='$id' AND valid=1";
$result = $conn->query($sql);
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

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome-free-6.2.0-web/css/all.min.css">
    <style>
        body{
            height: 300vh;
        }
        :root{
            --side-width: 260px;
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
<nav class="main-nav d-flex bg-dark fixed-top shadow">
    <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-4 text" href="">藝拍</a>
    <div class="nav">
      <a class="nav-link" aria-current="page" href="../seller/dashboard.php">首頁</a>
      <a class="nav-link" href="../seller/seller-product-list.php">我的藝術品</a>
      <a class="nav-link" href="../seller/sellers.php">畫家</a>
      <!-- <a class="nav-link active" href="../seller/dashboard.php">會員</a> -->
      <!-- <a class="nav-link" href="../product/order-list.php">訂單</a> -->
      <a class="nav-link" href="../seller/product-list2.php">展覽空間</a>
    </div>
    <div class="position-absolute top-0 end-0">
      <a class="btn btn-dark text-nowrap" href="#">進入個人頁面</a>
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
            <li><a href="../seller/sellers.php" class="px-3 py-2"> <i class="fa-solid fa-user fa-fw"></i>編輯個人頁面</a></li>
            <li class="active"><a href="../seller/seller.php?id=<?=$_SESSION["seller"]["id"]?>" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>               
            <li><a href="../seller/order-list.php" class="px-3 py-2"><i class="fa-solid fa-rectangle-list"></i>訂單管理</a></li>            
            <li><a href="../seller/file-upload.php" class="px-3 py-2"><i class="fa-solid fa-upload"></i>賣家藝術品上傳</a></li>  
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
        </ul>
        
    </nav>
  </aside>
  <main class="main-content">
    <div class="d-flex justify-content-between py-2">
        <h3>個人資料</h3>
    </div>
        
    <div class="container py-2">
    <!-- <div class="py-2">
        <a class="btn btn-dark" href="users.php">User List</a>
    </div> -->
    <?php if($userCount==0): ?>
        使用者不存在
    <?php else: ?>
    <table class="table table-bordered ">
        <tbody>
            <tr>
                <td>id</td>
                <td><?=$row["id"]?></td>
            </tr>
            <tr>
                <td>帳號</td>
                <td><?=$row["account"]?></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><?=$row["name"]?></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><?=$row["phone"]?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?=$row["email"]?></td>
            </tr>
            <tr>
                <td>Created At</td>
                <td><?=$row["created_at"]?></td>
            </tr>
            <tr>
                <td>introduce</td>
                <td><?=$row["introduce"]?></td>
            </tr>
        </tbody>
    </table>
    <div class=" d-flex justify-content-center">
        <a class="mx-2 btn btn-dark" href="edit-seller.php?id=<?=$row["id"]?>">編輯使用者</a>
        <a class="mx-2 btn btn-dark" href="password-edit-seller.php?id=<?=$row["id"]?>">變更密碼</a>
    </div>
    <?php endif ?>
  </div>
   

  </main>
    
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
     const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  </script>




  
</body>

</html>