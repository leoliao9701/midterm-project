<?php
require_once("../db2-connect.php");
// session_start();

// if(!isset($_SESSION["user"])){
//   header("location: login.php");
// }

$whereClause = "";

if (isset($_GET["date"])) {
    $date = $_GET["date"];
    $whereClause = "WHERE user_order.order_date = '$date'";
}
if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $whereClause = "WHERE user_order.product_id = '$product_id'";
}
if (isset($_GET["product_name"])) {
    $product_id = $_GET["product_name"];
    $whereClause = "WHERE product.product.name = '$product_name'";
}
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $whereClause = "WHERE user_order.user_id = '$user_id'";
}
if (isset($_GET["startDate"])) {
    $start = $_GET["startDate"];
    $end = $_GET["endDate"];
    $whereClause = "WHERE user_order.order_date BETWEEN '$start' AND '$end'";
}


$sql = "SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
JOIN users ON user_order.user_id = users.id
JOIN product ON user_order.product_id = product.id


$whereClause
ORDER BY user_order.id DESC
";

$result = $conn->query($sql);
$productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($rows);

//頁數
$sqlALL = "SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id ORDER BY user_order.order_date DESC";
$resultAll = $conn->query($sqlALL);
$userCount = $resultAll->num_rows;
// var_dump($resultAll); 
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$per_page = 5;
$page_start = ($page - 1) * $per_page;

$sqlPage = "SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id ORDER BY user_order.order_date DESC LIMIT {$page_start}, {$per_page}";

$resultPage = $conn->query($sqlPage);
//計算頁數
$totalPage = ceil($userCount / $per_page);  //ceil無條件進位    
$rows = $resultPage->fetch_all(MYSQLI_ASSOC);  //關聯式陣列

//頁數

?>
<!doctype html>
<html lang="en">

<head>
    <title>Order List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <Style>
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

        .nav a:hover {
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

        .aside-menu a:hover {
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
    </Style>
</head>

<body>
    <!--  style="border: 1px solid red ;"檢查邊框 -->
    <nav class="main-nav d-flex bg-dark fixed-top shadow">
        <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-4 text" href="">藝拍</a>
        <div class="nav">
            <a class="nav-link active" aria-current="page" href="#">首頁</a>
            <a class="nav-link" href="../product/product-list2.php">藝術品</a>
            <a class="nav-link" href="../seller/sellers.php">畫家</a>
            <a class="nav-link" href="../user/users.php">會員</a>
            <a class="nav-link" href="../product/order-list.php">訂單</a>
            <a class="nav-link" href="../user/product-list2.php">展覽空間</a>
        </div>
        <div class="position-absolute top-0 end-0">
            <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
        </div>
    </nav>
    <aside class="left-aside position-fixed bg-dark border-end">
        <nav class="aside-menu">
            <ul class="list-unstyled">
            <h1 class="py-2 d-flex justify-content-center text-white">會員</h1>
            <hr class="text-white">
                <li><a href="../user/buyers.php" class="px-3 py-2"> <i class="fa-solid fa-user fa-fw"></i>買家資料列表</a></li>
                <li><a href="../user/sellers.php" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>賣家資料列表</a></li>               
                <li><a href="../user/products.php" class="px-3 py-2"><i class="fa-regular fa-file-lines fa-fw"></i>藝術品列表</a></li>
                <li class="active"><a href="../user/order-list.php" class="px-3 py-2"><i class="fa-solid fa-heart"></i>訂單列表</a></li>
            </ul>
            
        </nav>
    </aside>
    <!-- 右主畫面 -->
    <main class="main-content">
        <div class="d-flex justify-content-between">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                <div class="container">
                    <?php if (isset($_GET["date"]) || isset($_GET["product_id"]) || isset($_GET["user_id"]) || isset($_GET["startDate"])) : ?>
                        <div class="py-2">
                            <a class="btn btn-dark" href="order-list.php">Back</a>
                        </div>
                    <?php endif; ?>
                    <div class="py-2">
                        <form action="">
                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="startDate" value="<?php
                                                                                                    if (isset($_GET["startDate"])) echo $_GET["startDate"];
                                                                                                    ?>">
                                </div>
                                <div class="col-auto">
                                    to
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="endDate" value="<?php
                                                                                                    if (isset($_GET["endDate"])) echo $_GET["endDate"];
                                                                                                    ?>">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-dark">確定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- 搜尋結果 -->
                    <!-- <div class="py-2">
                        <form action="order-list.php" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search">
                                <button type="submit" class="btn btn-secondary">搜尋</button>
                            </div>
                        </form>
                    </div> -->
                    <?php if (isset($_GET["search"])) : ?>
                        <div class="py-2">
                            <a class="btn btn-secondary" href="order-list.php">回訂單列表</a>
                        </div>
                        <h1><?= $_GET["search"] ?>的搜尋結果</h1>
                    <?php endif; ?>
                    <div class="py-2">
                        共 <?= $userCount ?> 筆
                    </div>

                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>訂購細節</th>
                                    <th>訂購日期</th>
                                    <th>產品名稱</th>
                                    <th>訂購數量</th>
                                    <th>訂購者</th>
                                    <th>寄送地址</th>
                                    <!-- <th>優惠券代碼</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rows as $data) : ?>

                                    <tr>
                                        <td>
                                            <a href="order-detail.php?id=<?= $data["id"] ?>" class="text-body" style="text-decoration:none;">
                                                <?= $data["id"] ?>
                                            </a>
                                        <td>
                                            <a href="order-list.php?date=<?= $data["order_date"] ?>" class="text-body" style="text-decoration:none;"><?= $data["order_date"] ?></a>
                                        </td>
                                        </td>
                                        <td>
                                            <a href="order-list.php?product_id=<?= $data["product_id"] ?>" class="text-body" style="text-decoration:none;">
                                                <?= $data["product_name"] ?>
                                            </a>
                                        </td>
                                        <td><?= $data["amount"] ?></td>
                                        <td>
                                            <a href="order-list.php?user_id=<?= $data["user_id"] ?>" class="text-body" style="text-decoration:none;">
                                                <?= $data["account"] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="order-list.php?send_address=<?= $data["send_address"] ?>" class="text-body" style="text-decoration:none;">
                                                <?= $data["send_address"] ?>
                                            </a>
                                        </td>
                                        <!-- <td>
                                            <a href="order-list2.php?coupon_id=<?= $data["coupon_id"] ?>">
                                                <?= $data["coupon_id"] ?>
                                            </a>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- 頁面選單 -->
        <div class="pagination-container justify-content-end">
            <?php if (!isset($_GET["search"])) : ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <li class="page-item <?php if ($i == $page) echo "active"; ?>"><a class="page-link" href="order-list.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>

            <?php elseif (isset($_GET["search"])) : ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <li class="page-item <?php if ($i == $page) echo "active"; ?>"><a class="page-link" href="order-list.php?startdate<?php $_GET["startDate"] ?>&endDate<?= $_GET["endDate"] ?>page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
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