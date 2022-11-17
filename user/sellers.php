<?php
require_once("../db2-connect.php");
session_start();

// if(!isset($_SESSION["seller"])){
//   header("location: login.php");
// }
// $page=$_GET["page"];

if(isset($_GET["search"])){
  $search=$_GET["search"];
  $sql="SELECT * FROM sellers WHERE account LIKE '%$search%' AND valid=1 ORDER BY created_at DESC";
  $result=$conn->query($sql);
  $userCount=$result->num_rows;

}else{
  if(isset($_GET["page"])){
    $page=$_GET["page"];
  }else{
    $page=1; 
  }

  $sqlAll="SELECT * FROM sellers WHERE valid=1 ";
  $resultAll=$conn->query($sqlAll);
  $userCount=$resultAll->num_rows;
  
  $per_page=5;
  $page_start=($page-1)*$per_page;

  $sql="SELECT * FROM sellers WHERE valid=1 ORDER BY created_at DESC LIMIT $page_start, $per_page";

  $result=$conn->query($sql);

  //計算頁數
  $totalPage=ceil($userCount/$per_page);  //無條件進位

}

$rows=$result->fetch_all(MYSQLI_ASSOC);  //關聯式陣列

// $rows2=$result->fetch_all(MYSQLI_NUM);
// var_dump($rows2);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <title>sellers</title>
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
      <a class="nav-link" href="../seller/product-list2.php">藝術品</a>
      <a class="nav-link" href="../seller/sellers.php">畫家</a>
      <a class="nav-link active" href="../seller/dashboard.php">會員</a>
      <a class="nav-link" href="../product/order-list.php">訂單</a>
      <a class="nav-link" href="../seller/product-list2.php">展覽空間</a>
    </div>
    <div class="position-absolute top-0 end-0">
      <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
    </div>
  </nav>
  <aside class="left-aside position-fixed bg-dark border-end">
    <nav class="aside-menu">
        <ul class="list-unstyled">
        <a href="#" class=" align-items-center link-dark text-decoration-none ">
          <img src="https://github.com/mdo.png" alt="" width="150" height="150" class="rounded-circle mx-auto">
          <!--<strong>mdo</strong>-->
        </a>
          <h1 class="py-2 d-flex justify-content-center text-white">會員</h1>
          <hr class="text-white">
          <li ><a href="../user/buyers.php" class="px-3 py-2"> <i class="fa-solid fa-user fa-fw"></i>買家資料列表</a></li>
            <li class="active"><a href="../user/sellers.php" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>賣家資料列表</a></li>               
            <li><a href="../user/products.php" class="px-3 py-2"><i class="fa-regular fa-file-lines fa-fw"></i>藝術品列表</a></li>
        
            <li><a href="../user/order-list.php" class="px-3 py-2"><i class="fa-solid fa-heart"></i>訂單列表</a></li>
        </ul>
        
    </nav>
  </aside>
  <main class="main-content">
    <div class="d-flex justify-content-between">
        <h3>會員資料管理</h3>
    
    </div>
        
    <div class="container">
    
    <div class="py-2 d-flex justify-content-between">
      <a class="btn btn-dark mx-2" href="./add-user.php">新增賣家</a>
        
    </div>

    <div class="py-2">
      <form action="./sellers.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search">
          <button type="submit" class="btn btn-dark">搜尋</button>
        </div>
      </form>
    </div>

    <?php if(isset($_GET["search"])): ?>
      <div class="py-2">
        <a class="btn btn-dark" href="sellers.php">回列表</a>
      </div>
      <h1><?=$_GET["search"]?>的搜尋結果</h1>
    <?php endif; ?>
    <div class="py-2"> 
        共 <?=$userCount?> 人
    </div>
    <!-- <?php var_dump($row)?> -->
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>account</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th></th>
                </tr>
            </thead>
            <?php if($userCount>0): ?>
            <tbody>
            <?php foreach($rows as $row): ?>
              <tr>
                <td><?=$row["id"]?></td>
                <td><?=$row["account"]?></td>
                <td><?=$row["name"]?></td>
                <td><?=$row["phone"]?></td>
                <td><?=$row["email"]?></td>
                <td>
                  <a class="btn btn-dark" href="user-seller.php?id=<?=$row["id"]?>">檢視</a>
                  <a class="btn btn-danger" href="./delete-seller.php?id=<?=$row["id"]?>">刪除</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <?php endif; ?>
    </table>
    <?php if(!isset($_GET["search"])): ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for($i=1; $i<=$totalPage; $i++): ?>
        <li class="page-item <?php if($i==$page)echo "active"; ?>"><a class="page-link" href="sellers.php?page=<?=$i?>"><?=$i?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
    <?php endif ;?>
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