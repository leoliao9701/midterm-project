<?php

if(!isset($_GET["id"])){
    echo "使用者不存在";
    exit;
}

$id=$_GET["id"];


require_once("../db2-connect.php");

$sql="SELECT * FROM users WHERE id='$id' AND valid=1";
$result = $conn->query($sql);
$userCount=$result->num_rows;

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
    
    <?php if($userCount==0): ?>
        使用者不存在
    <?php else: ?>
    <div class="py-2">
        <a class="btn btn-secondary" href="user.php?id=<?=$row["id"]?>">回使用者</a>
    </div>
    <form action="doUpdate.php" method="post">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <input type="hidden" name="id" value="<?=$row["id"]?>">
                    <td>id</td>
                    <td>
                        <?=$row["id"]?>
                    </td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td>
                        <input type="text" class="form-control" value="<?=$row["name"]?>" name="name">
                    </td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>
                        <input type="text" class="form-control" value="<?=$row["phone"]?>" name="phone">
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <input type="text" class="form-control" value="<?=$row["email"]?>" name="email">
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-secondary" type="submit">送出</button>
    </form>
    <?php endif ?>
  </div>
</body>

</html>