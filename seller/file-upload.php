<?php
require_once("../db2-connect.php");

session_start();

if(!isset($_SESSION["seller"])){
    header("location: login.php");
}

$sql="SELECT * FROM product ORDER BY id DESC";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);


// var_dump($rows);

?>

<!doctype html>
<html lang="en">

<head>
    <title>file-upload</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .object-cover{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="doUpload.php" method="post" enctype="multipart/form-data">
            <a href="./dashboard.php" class="my-2 btn btn-info">返回</a>
            <div class="mb-2">
                <label for="">名稱</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">作者</label>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">類別</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">水墨</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">膠彩</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="3">
                    <label class="form-check-label" for="inlineRadio2">油畫</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio2">水彩</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="5">
                    <label class="form-check-label" for="inlineRadio2">版畫</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="6">
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
                <label for="">選取檔案</label>
                <input type="file" name="myFile" class="form-control">
            </div>
            <button class="btn btn-info" type="submit">送出</button>
        </form>
        <?php exit; ?>
        <div class="row g-3 mt-3">
            <?php foreach($rows as $image): ?>
            <div class="col-lg-3 col-md-6">
                <div class="ratio ratio-16x9">
                    <img class="object-cover" src="upload/<?=$image["name"]?>" alt="">
                </div>
                <h4 class="mt-2">圖片名稱<?=$image["name"]?></h3>
            </div>
            <?php endforeach; ?>
        </div>
        <?php var_dump($result); ?>
    </div>


</body>

</html>