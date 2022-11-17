<?php
require_once("../db2-connect.php");

session_start();
if (!isset($_SESSION["seller"])) {
  header("location: login.php");
}
$category = "";
$sqlCategory = "SELECT * FROM category  ORDER BY id ASC";
$resultCategory = $conn->query($sqlCategory);
$rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);


if (isset($_GET["min"])) {
  $min = $_GET["min"];
  $max = $_GET["max"];

  if (empty($min)) $min = 0;
  if (empty($max)) $max = 99999;

  $sql = "SELECT product.*, category.name AS category_name FROM product JOIN category ON product.category = category.id
    WHERE price >= $min AND price <=$max";
} else {
  if (isset($_GET["category"])) {
    $category = $_GET["category"];

    $sql = "SELECT product.*, category.name AS category_name FROM product
        JOIN category ON product.category = category.id WHERE product.category=$category";
  } else {
    $sql = "SELECT product.*, category.name AS category_name FROM product
        JOIN category ON product.category = category.id";
  }
  //$sqlCategory_id = "SELECT * FROM category WHERE `category` = 1 ORDER BY id ASC";

}


$result = $conn->query($sql);
$productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);


// 頁數


if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}
$per_page = 10;
// $page=1;
$page_start = ($page - 1) * $per_page;
// 分類頁面ＳＱＬ
if (isset($_GET["category"])) {
  $pageCategory = $_GET["category"];
  $sql = "SELECT * FROM `product` WHERE `category` =  " . $_GET["category"] . " ORDER BY `product`.`create_time` DESC LIMIT $page_start, $per_page";
  $sqlAll = "SELECT * FROM `product` WHERE `category` =  " . $_GET["category"] . " ORDER BY `product`.`create_time` DESC";
  $resultAll = $conn->query($sqlAll);
  $userCount = $resultAll->num_rows;
} else {
  $sql = "SELECT * FROM `product` ORDER BY `product`.`create_time` DESC
  LIMIT $page_start, $per_page";
  $sqlAll = "SELECT * FROM `product` ORDER BY `product`.`id` ASC ";
  $resultAll = $conn->query($sqlAll);
  $userCount = $resultAll->num_rows;
}
// 

$result = $conn->query($sql);

//計算頁數
$totalPage = ceil($userCount / $per_page);
$totalPage_category =

  $rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
// exit;

?>
<!doctype html>
<html lang="en">

<head>
  <title>Seller-product-list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="/fontawesome-free-6.2.0-web/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    body {
      height: 300vh;
    }

    a{
      text-decoration: none;
      color: #444;
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
  </style>
</head>

<body>
  <!--  style="border: 1px solid red ;"檢查邊框 -->
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
        <h1>我的藝術品</h1>
      </div>
      <div class="">
        <div class="container">

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link <?php if (!isset($_GET["category"])) echo "active"; ?>" aria-current="page" href="seller-product-list.php">全部</a>
            </li>
            <!--  -->
            <?php foreach ($rowsCategory as $category) : ?>
              <li class="nav-item">
                <a class="nav-link" <?php if (isset($_GET["category"]) && $_GET["category"] == $category["id"]) echo "active"; ?> href="seller-product-list.php?category=<?= $category["id"] ?>"> <?= $category["name"] ?> </a>
              </li>
            <?php endforeach; ?>
            <!--  -->
          </ul>
          <div class="py-2">
            <form action="seller-product-list.php">
              <div class="row align-items-center g-2">
                <?php if (isset($_GET["min"])) : ?>
                  <div class="col-auto">
                    <a class="btn btn-info" href="product-list2.php">Back</a>
                  </div>
                <?php endif; ?>
                <div class="col-auto">
                  <input type="number" class="form-control text-center" name="min" placeholder="輸入最小金額" value="<?php
                                                                                                                if (isset($_GET["min"])) echo $price; ?>">
                </div>
                <div class="col-auto">
                  ~
                </div>
                <div class="col-auto">
                  <input type="number" class="form-control text-center" name="max" placeholder="輸入最大金額" value="<?php
                                                                                                                if (isset($_GET["max"])) echo $price; ?>">
                </div>
                <div class="col-auto">
                  <button class="btn btn-dark" type="submit">篩選</button>
                </div>
              </div>
            </form>
          </div>
          <div class="py-2 text-end">
            共<?= $productCount ?>項
          </div>
          <?php if ($userCount > 0) : ?>
            <div class="row d-flex flex-wrap">
              <?php foreach ($rows as $row) :
              ?>

                <div class="col-lg-3 col-md-6 py-3">
                  <div class="card position-relative">
                    <a class="like position-absolute"></a>
                    <figure class="ratio ratio-16x9">
                      <img class="object-cover" src="../product/images/<?= $row["images"] ?>" alt="">
                    </figure>
                    <div class="px-2 pb-3">
                      <div class="pb-2 text-primary">
                        <a href="seller-product-list.php?category=<?= $row["category"] ?>">
                          <?php
                          if ($row["category"] == "1") {
                            echo "ink";
                          } elseif ($row["category"] == "2") {
                            echo "collage";
                          } elseif ($row["category"] == "3") {
                            echo "canvas";
                          } elseif ($row["category"] == "4") {
                            echo "watercolor";
                          } elseif ($row["category"] == "5") {
                            echo "Sculpture";
                          } elseif ($row["category"] == "6") {
                            echo "digit";
                          }
                          ?>

                        </a>
                      </div>
                      <h3 class="text-center h4">
                        <?= $row["name"] ?>
                      </h3>
                      <div class="text-end">
                        <?= $row["price"] ?>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>
            </div>
          <?php endif; ?>

        </div>
        <!-- 頁碼選單 -->
        <?php if (isset($_GET["category"])) : ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <li class="page-item 
            <?php
                if ($i == $page) echo "active";
            ?>">
                  <a class="page-link" href="seller-product-list.php?category=<?= $_GET["category"] ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        <?php else : ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                <li class="page-item 
            <?php
                if ($i == $page) echo "active";
            ?>">
                  <a class="page-link" href="seller-product-list.php?page=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        <?php endif; ?>

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