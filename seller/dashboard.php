<?php
session_start();

if(!isset($_SESSION["seller"])){
  header("location: login.php");
}
//如果登出，回到login這一頁



?>


<!doctype html>
<html lang="en">

<head>
  <title>dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <a class="nav-link active" aria-current="page" href="../seller/dashboard.php">首頁</a>
        <a class="nav-link" href="../seller/seller-product-list.php">我的藝術品</a>
        <!-- <a class="nav-link" href="../seller/sellers.php">畫家</a>
        <a class="nav-link" href="../user/users.php">會員</a> -->
        <a class="nav-link" href="../seller/order-list.php">畫家</a>
        <a class="nav-link" href="">展覽空間</a>
      </div>
      <div class="position-absolute top-0 end-0">
        <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
      </div>
    </nav>
    <aside class="left-aside position-fixed bg-dark border-end">
      <nav class="aside-menu">
        <!-- <div class="pt-2 px-3 pb-2 d-flex justify-content-center text-white">
        Welcome <?= $_SESSION["user"]["account"] ?> !
      </div> -->
      <ul class="list-unstyled">
                    <a href="#" class=" align-items-center link-dark text-decoration-none ">
                        <img src="https://github.com/mdo.png" alt="" width="110" height="110" class="rounded-circle mx-auto">
                        <!--<strong>mdo</strong>-->
                    </a>
                    <h1 class="py-1 d-flex justify-content-center text-white">Studio</h1>
                    <hr class="text-white">
                    <li class="active"><a href="../seller/sellers.php" class="px-3 py-2"><i class="fa-solid fa-user fa-fw"></i>編輯個人頁面</a></li>
                    <li><a href="../seller/seller.php?id=<?=$_SESSION["seller"]["id"]?>" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>         
                    <li><a href="./order-list.php" class="px-3 py-2"><i class="fa-solid fa-rectangle-list"></i>訂單管理</a></li>
                    <li ><a href="../seller/file-upload.php" class="px-3 py-2"><i class="fa-solid fa-upload"></i>上架藝術品</a></li>
                    <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
                    <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
                </ul>

      </nav>
    </aside>

  <main class="main-content">
  <div class="d-flex justify-content-between">
        <h1> <?=$_SESSION["seller"]["name"]?> Studio</h1>
  </div>
  <div class="row mt-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">第一次開藝廊？</strong>
          <h3 class="mb-0">新手上路教學</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="https://images.pexels.com/photos/3778179/pexels-photo-3778179.jpeg?auto=compress&cs=tinysrgb&w=800" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">佈置自己的藝廊!</strong>
          <h3 class="mb-0">點我預覽前台</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" img src=""><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div> 
    </div>
  </div>

  <div class="row">
    <h2>待辦清單</h2>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">0</h5>
        <p class="card-text">尚未付款</p>
        <a href="#" class="opacity-75">前往確認</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">0</h5>
        <p class="card-text">待出貨</p>
        <a href="#" class="opacity-75">前往確認</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">0</h5>
        <p class="card-text">新申請退款</p>
        <a href="#" class="opacity-75">前往確認</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">0</h5>
        <p class="card-text">等待回覆訊息</p>
        <a href="#" class="opacity-75">前往確認</a>
      </div>
    </div>
  </div>
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
