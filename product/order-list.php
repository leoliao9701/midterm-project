<?php
require_once("../db2-connect.php");

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
    <Style>
        .body {
            margin: 0;
            padding: 0;
        }

        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .footer {
            background-color: black;
            padding: 25px 30px;
            min-height: 50px;
        }
        .nav-item:hover{
            background: #0d6efd;
            border-radius: 15px;
        }
    </Style>
</head>

<body>
    <!--  style="border: 1px solid red ;"檢查邊框 -->
    <main>
        <div class="row g-0">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%; min-height:100vh">
                    <a href="../seller/dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                        <span class="fs-4">藝拍</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" aria-current="page">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home"></use>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="order-list2.php" class="nav-link  text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                                </svg>
                                Coupon
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="order-detail.php" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#table"></use>
                                </svg>
                                Order List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid"></use>
                                </svg>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle"></use>
                                </svg>
                                Customers
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/images/1.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>about us</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">

                <div class="container">
                    <?php if (isset($_GET["date"]) || isset($_GET["product_id"]) || isset($_GET["user_id"]) || isset($_GET["startDate"])) : ?>
                        <div class="py-2">
                            <a class="btn btn-info" href="order-list.php">Back</a>
                        </div>
                    <?php endif; ?>
                    <div class="py-2">
                        <form action="">
                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <input type="date" class="form-control" name="startDate" value="<?php
                                                                                                    if (isset($_GET["startDate"])) echo $_GET           ["startDate"];
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
                                    <button class="btn btn-info">確定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
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
                                            <a href="order-detail.php?id=<?= $data["id"] ?>">
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
                

                <!-- 頁面選單 -->
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
                </nav>
                                            



            </div>
        </div>
    </main>
    <footer class="footer">
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


    </footer>

</body>

</html>