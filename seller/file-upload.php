<?php
require_once("../db2-connect.php");
$sql = "SELECT * FROM product ORDER BY id DESC";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);

?>

<!doctype html>
<html lang="en">

<head>
    <title>fille-upload</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="/fontawesome-free-6.2.0-web/css/all.min.css">


    <script src="main.js" defer></script>

</head>

<body>
    <style>
        body {
            height: 300vh;

        }

        :root {
            --side-width: 260px;
        }

        .container {
            width: 80%;
            height: auto;
            position: relative;
            top: 80px;
            left: 140px;
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
            <a class="text-nowrap px-3 text-white text-decoration-none d-flex align-items-center justify-content-center logo flex-shrink-0 fs-4 text" href="">藝拍</a>
            <div class="nav">
                <a class="nav-link" aria-current="page" href="../seller/dashboard.php">首頁</a>
                <a class="nav-link" href="../seller/seller-product-list.php">我的藝術品</a>
                <a class="nav-link" href="../seller/sellers.php">畫家</a>
                <!-- <a class="nav-link active" href="../seller/dashboard.php">會員</a> -->
                <!-- <a class="nav-link" href="../product/order-list.php">訂單</a> -->
                <a class="nav-link" href="../seller/product-list2.php">展覽空間</a>
            </div>
            <div class="position-absolute top-0 end-0">
                <a class="btn btn-dark text-nowrap" href="#">進入個人頁面</a>
                <a class="btn btn-dark text-nowrap" href="logout.php">Sign out</a>
            </div>
        </nav>
        <aside class="left-aside position-fixed bg-dark border-end">
            <nav class="aside-menu">
                <!-- <div class="pt-2 px-3 pb-2 d-flex justify-content-center text-white">
Welcome <?= $_SESSION["seller"]["account"] ?> !
</div> -->
                <ul class="list-unstyled">
                    <a href="#" class=" align-items-center link-dark text-decoration-none ">
                        <img src="https://github.com/mdo.png" alt="" width="110" height="110" class="rounded-circle mx-auto">
                        <!--<strong>mdo</strong>-->
                    </a>
                    <h1 class="py-1 d-flex justify-content-center text-white">會員</h1>
                    <hr class="text-white">
                    <li><a href="../seller/sellers.php" class="px-3 py-2"><i class="fa-solid fa-user fa-fw"></i>編輯個人頁面</a></li>
                    <li><a href="../seller/seller.php?id=<?= $_SESSION["seller"]["id"] ?>" class="px-3 py-2"> <i class="fa-solid fa-face-smile fa-fw"></i>會員個人資料</a></li>
                    <li><a href="../seller/order-list.php" class="px-3 py-2"><i class="fa-solid fa-rectangle-list"></i>訂單管理</a></li>
                    <li class="active"><a href="../seller/file-upload.php" class="px-3 py-2"><i class="fa-solid fa-upload"></i>賣家藝術品上傳</a></li>
                    <li><a href="" class="px-3 py-2"><i class="fa-solid fa-barcode"></i>折扣卷</a></li>
                    <li><a href="" class="px-3 py-2"><i class="fa-solid fa-heart"></i>我的收藏</a></li>
                </ul>

            </nav>
        </aside>
        <div class="container py-3">
            <a class="btn btn-dark" href="seller-product-list.php">回商品列表</a>
            <form action="doUpload-seller.php" method="post" enctype="multipart/form-data">
                <div class="mb-2 py-2">
                    <label for="">作品名稱</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">作者</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">類別</label>
                    <div class="form-check form-check-inline" style="display:none;">
                        <!-- 預設值 -->
                        <input class="form-check-input" type="radio" name="category" value="" checked>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="1">
                        <label class="form-check-label" for="inlineRadio1">水墨</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="2">
                        <label class="form-check-label" for="inlineRadio2">膠彩</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="3">
                        <label class="form-check-label" for="inlineRadio2">油畫</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="4">
                        <label class="form-check-label" for="inlineRadio2">水彩</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="5">
                        <label class="form-check-label" for="inlineRadio2">版畫</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="6">
                        <label class="form-check-label" for="inlineRadio2">電繪</label>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="">簡介</label>
                    <input type="text" name="detailed" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">價格</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="">銷售人</label>
                    <input type="text" name="sell_id" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">數量</label>
                    <input type="text" name="amount" class="form-control">
                </div>

                <div class="mb-2">
                    <div class="row row1">
                        <span class="fileInfo0">請選擇檔案</span>
                        <label for="file0">選擇檔案</label>
                        <input id="file0" name="file0" type="file" accept=".png,.jpg,.jpeg">
                    </div>
                    <!-- <label for="">檔案名稱</label> -->
                    <!-- <input type="file" name="images" class="form-control"> -->
                </div>
                <button class="btn btn-dark" type="submit">送出</button>

            </form>

            <?php exit; ?>
            <div class="row g-3 mt-3">
                <?php foreach ($rows as $image) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="ratio ratio-16x9">
                            <img class="object-cover" src="../upload/<?= $image["name"] ?>" alt="">
                        </div>
                        <h4 class="mt-2">圖片名稱<?= $image["name"] ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php var_dump($result); ?>
        </div>


    </body>

</html>