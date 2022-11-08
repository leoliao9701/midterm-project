<?php
require_once("../db2-connect.php");

session_start();
if(!isset($_SESSION["user"])){
  header("location: login.php");
}

$sqlCategory = "SELECT * FROM category ORDER BY id ASC";
$resultCategory = $conn->query($sqlCategory);
$rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC);
// var_dump($resultCategory);
// exit;


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
}


$result = $conn->query($sql);
$productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);



// var_dump($rows);
// exit;

?>
<!doctype html>
<html lang="en">

<head>
  <title>Product List</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
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
    a{
      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <!--  style="border: 1px solid red ;"檢查邊框 -->
  <main>
    <div class="row g-0">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%;">
          <a href="../user/login.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
              <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">藝拍</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#home"></use>
                </svg>
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#speedometer2"></use>
                </svg>
                Dashboard
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#table"></use>
                </svg>
                Orders
              </a>
            </li>
            <li>
              <a href="product-list2.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                  <use xlink:href="#grid"></use>
                </svg>
                藝術品
              </a>
            </li>
            <li>
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
              <li><a class="dropdown-item" href="#">登出</a></li>
            </ul>
          </div>
        </div>

      </div>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
        <div class="container">

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link <?php if (!isset($_GET["category"])) echo "active"; ?>" aria-current="page" href="product-list2.php">全部</a>
            </li>
            <?php foreach ($rowsCategory as $category) : ?>
              <li class="nav-item">
                <a class="nav-link" <?php if (isset($_GET["category"]) && $_GET["category"] == $category["id"]) echo "active"; ?> href="product-list2.php?category=<?= $category["id"] ?>"><?= $category["name"] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="py-2">
            <form action="product-list2.php">
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
                  if (isset($_GET["max"])) echo $price;?>">
                </div>
                <div class="col-auto">
                  <button class="btn btn-info" type="submit">篩選</button>
                </div>
              </div>
            </form>
          </div>
          <div class="py-2 text-end">
            共<?= $productCount ?>項
          </div>
          <div class="row d-flex flex-wrap">
            <?php foreach ($rows as $product) :
            ?>
              <div class="col-lg-3 col-md-6 py-3">
                <div class="card position-relative">
                  <a class="like position-absolute"></a>
                  <figure class="ratio ratio-16x9">
                    <img class="object-cover" src="./images/<?= $product["images"] ?>" alt="">
                  </figure>
                  <div class="px-2 pb-3">
                    <div class="pb-2 text-primary">
                      <a href="product-list2.php?category=<?= $product["category"] ?>"><?= $product["category_name"] ?></a>
                    </div>
                    <h3 class="text-center h4">
                      <?= $product["name"] ?>
                    </h3>
                    <div class="text-end">
                      <?= $product["price"] ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
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
