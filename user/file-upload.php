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

    <style>
        .object-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <script src="main.js" defer></script>

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-dark" href="products.php">回商品列表</a>
        </div>
        <form action="doUpload.php" method="post" enctype="multipart/form-data">
            <div class="mb-2">
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
                <span class="filedark0">請選擇檔案</span>
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
                        <img class="object-cover" src="upload/<?= $image["name"] ?>" alt="">
                    </div>
                    <h4 class="mt-2">圖片名稱<?= $image["name"] ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
        <?php var_dump($result); ?>
    </div>


</body>

</html>