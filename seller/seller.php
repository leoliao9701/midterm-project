<?php

if(!isset($_GET["id"])){
    echo "使用者不存在";
    exit;
}

$id=$_GET["id"];


require_once("../db2-connect.php");

$sql="SELECT * FROM sellers WHERE id='$id' AND valid=1";
$result = $conn->query($sql);
$sellerCount=$result->num_rows;

$row=$result->fetch_assoc();

// var_dump($row);
// exit;


?>

<!doctype html>
<html lang="en">

<head>
  <title><?=$row["name"]?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="py-2">
        <a class="btn btn-secondary" href="sellers.php">Seller List</a>
    </div>
    <?php if($sellerCount==0): ?>
        使用者不存在
    <?php else: ?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>id</td>
                <td><?=$row["id"]?></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><?=$row["name"]?></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><?=$row["phone"]?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?=$row["email"]?></td>
            </tr>
            <tr>
                <td>Created At</td>
                <td><?=$row["created_at"]?></td>
            </tr>
            <tr>
                <td>Introduce</td>
                <td><?=$row["introduce"]?></td>
            </tr>
        </tbody>
    </table>
    <div class="py-2">
        <a class="btn btn-secondary" href="edit-seller.php?id=<?=$row["id"]?>">編輯使用者</a>
    </div>
    <?php endif ?>
  </div>
</body>

</html>