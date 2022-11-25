<?php

if (!isset($_GET["id"])) {
    echo "商品不存在";
    exit;
}

$id = $_GET["id"];

require_once("../db2-connect.php");

$sql = "SELECT * FROM product WHERE id='$id' ";
$result = $conn->query($sql);
$userCount = $result->num_rows;

$row = $result->fetch_assoc();

// var_dump($row);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
    <title><?= $row["name"] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <?php if ($userCount == 0) : ?>
            商品不存在
        <?php else : ?>
            <div class="py-2">
                <a class="btn btn-dark" href="../product/product_page.php?id=<?= $row["id"] ?>">回商品資料</a>
            </div>
            <form action="doEdit.php" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <td>id</td>
                            <td>
                                <?= $row["id"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>作品名稱</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["name"] ?>" name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>類別</td>
                            <td>

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

                            </td>
                        </tr>
                        <tr>
                            <td>價錢</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["price"] ?>" name="price">
                            </td>
                        </tr>
                        <tr>
                            <td>數量</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["amount"] ?>" name="amount">
                            </td>
                        </tr>

                        <tr>
                            <td>作者</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["author"] ?>" name="author">
                            </td>
                        </tr>
                        <tr>
                            <td>圖片更新</td>

                            <td>
                                <span>
                                    <p>原始檔案：<?= $row["images"] ?></p>
                                </span>
                                <input type="file" name="images" class="form-control" value="<?= $row["images"] ?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>簡介</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["detailed"] ?>" name="detailed">
                            </td>
                        </tr>
                        <tr>
                            <td>賣家</td>
                            <td>
                                <input type="text" class="form-control" value="<?= $row["sell_id"] ?>" name="sell_id">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-dark" type="submit">送出</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>