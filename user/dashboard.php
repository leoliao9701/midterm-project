<?php

session_start();

if(!isset($_SESSION["user"])){
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
            color: #333;
            text-decoration: none;
        }
        .aside-menu a:hover{
            color: #666;
        }
        .aside-menu a i{
            margin-right: 8px;
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
    <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center logo flex-shrink-0" href="">藝拍</a>
    <input type="text" class="form-control">
    <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
  </nav>
  <aside class="left-aside position-fixed bg-light border-end">
    <nav class="aside-menu">
      <div class="pt-1 px-3 pb-2">
        Welcome <?=$_SESSION["user"]["account"]?> !
      </div>
        <ul class="list-unstyled">
            <!-- <li><a href="" class="px-3 py-2"> <i class="fa-solid fa-gauge fa-fw"></i>Dashboard</a></li>            
            <li><a href="" class="px-3 py-2"><i class="fa-regular fa-file-lines fa-fw"></i>Order</a></li> -->
            <li><a href="../user/users.php" class="px-3 py-2"><i class="fa-solid fa-user"></i>買家管理</a></li>
            <li><a href="../product/product-list2.php" class="px-3 py-2"><i class="fa-solid fa-cart-shopping"></i>藝術品</a></li>
            <!-- <li><a href="" class="px-3 py-2"><i class="fa-solid fa-chart-simple"></i>Reports</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-layer-group"></i>Integrations</a></li> -->
        </ul>
        <!-- <div class="aside-subtitle px-3 text-secondary mb-4 d-flex justify-content-between">SAVED REPORTS <a role="button"><i class="fa-solid fa-plus"></i></a></div>

        <ul class="list-unstyled">
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-file"></i>Current month</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-file"></i>Last quarter</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-file"></i>Social engagement</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-file"></i>Year-end sale</a></li>
        </ul> -->
    </nav>
  </aside>
  <main class="main-content">
    <div class="d-flex justify-content-between">
        <h1>主選單</h1>

        
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