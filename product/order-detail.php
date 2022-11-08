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

  <main>
    <div class="row g-0">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%; min-height:100vh">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                Order List
              </a>
            </li>
            <li class="nav-item">
              <a href="order-detail.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#table"></use>
                </svg>
                Order Details
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

          <div class="py-2">
            <a class="btn btn-info" href="order-list2.php">Back</a>
          </div>
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