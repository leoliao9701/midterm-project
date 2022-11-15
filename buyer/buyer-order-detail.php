<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("location: login.php");
}
//如果登出，回到login這一頁
require_once("../db2-connect.php");

$id = $_GET["id"];

// if (!isset($_GET["id"])) {
//   echo "訂單不存在";
//   exit;
// }
$sql = "SELECT user_order.*, users.account, product.price, product.name AS product_id FROM user_order
JOIN users ON user_order.user_id = users.id
JOIN product ON user_order.product_id = product.id

WHERE user_order.user_id=$id
ORDER BY user_order.user_id DESC";

$result = $conn->query($sql);
// $productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
// exit;


?>


<!doctype html>
<html lang="en">

<head>
    <title>dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome-free-6.2.0-web/css/all.min.css">
    <style>
        body {
            height: 300vh;
        }

        :root {
            --side-width: 260px;
        }

        .main-nav .form-control {
            background: #444;
            border: none;
            color: #fff;
            border-radius: 0;
        }

        .main-nav .btn {
            border-radius: 0;
        }

        .nav a {
            color: gray;
        }

        .nav a:hover,
        .nav a.active {
            color: white;
        }

        .logo {
            width: var(--side-width);
        }

        .left-aside {
            width: var(--side-width);
            height: 100vh;
            padding-top: 54px;
            overflow: auto;
        }

        .aside-menu ul a {
            display: block;
            color: #666;
            text-decoration: none;
            display: flex;
            justify-content: center;
            margin: 15px;
        }

        .aside-menu a:hover,
        .aside-menu li.active a {
            color: white;
            background: cadetblue;
            border-radius: 0.375rem;

        }

        .aside-menu a i {
            margin-right: 8px;
            margin-top: 4px;
        }

        .aside-subtitle {
            font-size: 14px;
        }

        .main-content {
            margin-left: calc(var(--side-width) + 20px);
            padding-top: 54px;
        }
    </style>
</head>

<body>
    <nav class="main-nav d-flex bg-dark fixed-top shadow">
        <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-3 text" href="">藝拍</a>
        <div class="nav">
            <a class="nav-link" href="#">首頁</a>
            <a class="nav-link" href="../buyer/buyer-product-list.php">藝術品參觀</a>
            <!-- <a class="nav-link" href="../seller/sellers.php">畫家</a>
            <a class="nav-link active" href="../buyer/dashboard.php">會員</a>
            <a class="nav-link" href="../product/order-list.php">訂單</a> -->
            <a class="nav-link" href="#">展覽空間</a>
        </div>
        <div class="position-absolute top-0 end-0">
            <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
        </div>
    </nav>
    <aside class="left-aside position-fixed bg-dark border-end">
        <nav class="aside-menu">
      <ul class="list-unstyled">
      <a href="#" class=" align-items-center link-dark text-decoration-none ">
          <img src="./images/a.jpg" alt="" width="110" height="110" class="rounded-circle mx-auto">
        </a>
          <h1 class="py-2 d-flex justify-content-center text-white">會員</h1>
          <hr class="text-white">
            <li><a href="../buyer/buyer.php?id=<?=$_SESSION["user"]["id"]?>" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>               
            <li class="active"><a href="../buyer/buyer-order-detail.php?id=<?=$_SESSION["user"]["id"]?>" class="px-3 py-2"><i class="fa-regular fa-file-lines fa-fw"></i>個人訂單檢視</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
      </ul>

        </nav>
    </aside>
    <main class="main-content">
        <div class="d-flex justify-content-between">
            <h3>個人訂單檢視</h3>

        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>訂單編號</th>
                        <th>訂購日期</th>
                        <th>訂購者</th>
                        <th>品名</th>
                        <th>單價</th>
                        <th>數量</th>
                        <th>總價</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["order_date"] ?></td>
                            <td><?= $row["account"] ?></td>
                            <td><?= $row["product_id"] ?></td>
                            <td><?= $row["price"] ?></td>
                            <td><?= $row["amount"] ?></td>
                            <td><?= $row["price"] * $row["amount"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
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