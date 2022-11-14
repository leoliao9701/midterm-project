<?php
require_once("../db2-connect.php");
session_start();



//<- 抓資料 重新命名product.name成product_name ->
// if(isset($_GET["date"])){
//     $date=$_GET["date"];
//     $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
//     JOIN users ON user_order.user_id = users.id
//     JOIN product ON user_order.product_id = product.id
//     WHERE user_order.order_date = '$date'
//     ORDER BY user_order.id DESC
//     ";

// }else if(isset($_GET["product_id"])){
//     $product_id=$_GET["product_id"];
//     $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
//     JOIN users ON user_order.user_id = users.id
//     JOIN product ON user_order.product_id = product.id
//     WHERE user_order.product_id = '$product_id'
//     ORDER BY user_order.id DESC
//     ";

// }else{
//     $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
//     JOIN users ON user_order.user_id = users.id
//     JOIN product ON user_order.product_id = product.id
//     ORDER BY user_order.id DESC
//     ";
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
    <!--  style="border: 1px solid red ;"檢查邊框 -->
    <nav class="main-nav d-flex bg-dark fixed-top shadow">
    <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-4 text" href="">藝拍</a>
    <div class="nav">
      <a class="nav-link" aria-current="page" href="../seller/dashboard.php">首頁</a>
      <a class="nav-link" href="../seller/seller-product-list.php">我的藝術品</a>
      <a class="nav-link" href="../seller/sellers.php">畫家</a>
      <!-- <a class="nav-link active" href="../user/dashboard.php">會員</a> -->
      <!-- <a class="nav-link" href="../product/order-list.php">訂單</a> -->
      <a class="nav-link" href="../user/product-list2.php">展覽空間</a>
    </div>
    <div class="position-absolute top-0 end-0">
    <a class="btn btn-dark text-nowrap" href="#">進入前台個人頁面</a>
      <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
    </div>
  </nav>
  <aside class="left-aside position-fixed bg-dark border-end">
    <nav class="aside-menu">
      <!-- <div class="pt-2 px-3 pb-2 d-flex justify-content-center text-white">
        Welcome <?=$_SESSION["seller"]["account"]?> !
      </div> -->
      <ul class="list-unstyled">
    <!--會員大頭貼-->
      <a href="#" class=" align-items-center link-dark text-decoration-none ">
          <img src="https://github.com/mdo.png" alt="" width="110" height="110" class="rounded-circle mx-auto">
          <!--<strong>mdo</strong>-->
      </a>
    
      <h1 class="py-1 d-flex justify-content-center text-white">會員</h1>
      <hr class="text-white">
        <li><a href="../seller/sellers.php" class="px-3 py-2"> <i class="fa-solid fa-heart"></i>編輯個人頁面</a></li>
        <li><a href="../seller/seller.php?id=<?=$_SESSION["seller"]["id"]?>" class="px-3 py-2"><i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>                              
            <li class=active><a href="../seller/order-list.php" class="px-3 py-2"><i class="fa-solid fa-heart"></i>訂單管理</a></li>
            <li><a href="../seller/file-upload.php" class="px-3 py-2"><i class="fa-solid fa-heart"></i>賣家藝術品上傳</a></li>  
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
            <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
        </ul>
    </nav>
  </aside>
    <main class="main-content">
        <?php if (isset($_GET["date"]) || isset($_GET["product_id"]) || isset($_GET["user_id"]) || isset($_GET["startDate"])) : ?>
            <div class="py-2">
                <a class="btn btn-dark" href="order-list.php">Back</a>
            </div>
            <?php endif; ?>
            <div class="py-2">
            
            <form action="">
                <div class="row g-2 align-items-center">
                <h1>訂單管理</h1>
                <div class="col-auto">
                    
                    <input type="date" class="form-control" name="startDate" value="<?php
                        if (isset($_GET["startDate"])) echo $_GET["startDate"];?>">
                </div>
                <div class="col-auto">to</div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="endDate" value="<?php
                 if (isset($_GET["endDate"])) echo $_GET["endDate"];?>">
                </div>
                <div class="col-auto">
                    <button class="btn btn-dark">確定</button>
                </div>
                </div>
            </form>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>訂單編號</th>
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
                                            <a title="點此可查看訂單細節" href="order-detail.php?id=<?= $data["id"] ?>">
                                                <?= $data["id"] ?>
                                            </a>
                                        <td>
                                            <a href="order-list.php?date=<?= $data["order_date"] ?>"><?= $data["order_date"] ?></a>
                                        </td>
                                        </td>
                                        <td>
                                        <a href="order-list.php?product_id=<?=$data["product_id"] ?>">
                                        <?=$data["product_name"] ?>
                                        </a>
                                        </td>
                                        <td><?= $data["amount"] ?></td>
                                        <td>
                                            <a href="order-list.php?user_id=<?= $data["user_id"] ?>">
                                                <?= $data["account"] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="order-list.php?send_address=<?= $data["send_address"] ?>">
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
                <!-- 頁面選單
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end px-5">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav> -->
                            
            </div>
        </div>
    </main>


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