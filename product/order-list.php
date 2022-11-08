<?php
require_once("../db2-connect.php");

/*
if(isset($_GET["date"])){
    $date=$_GET["date"];
    $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
    JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id
    WHERE user_order.order_date = '$date'
    ORDER BY user_order.id DESC
    ";

}else if(isset($_GET["product_id"])){
    $product_id=$_GET["product_id"];
    $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
    JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id
    WHERE user_order.product_id = '$product_id'
    ORDER BY user_order.id DESC
    ";

}else{
    $sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
    JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id
    ORDER BY user_order.id DESC
    ";
}
*/
$whereClause="";

if(isset($_GET["date"])){
    $date=$_GET["date"];
    $whereClause="WHERE user_order.order_date = '$date'";
}

if(isset($_GET["product_id"])){
    $product_id=$_GET["product_id"];
    $whereClause="WHERE user_order.product_id = '$product_id'";
}

if(isset($_GET["user_id"])){
    $user_id=$_GET["user_id"];
    $whereClause="WHERE user_order.user_id = '$user_id'";
}

if(isset($_GET["startDate"])){
    $start=$_GET["startDate"];
    $end=$_GET["endDate"];
    $whereClause="WHERE user_order.order_date BETWEEN '$start' AND '$end'";
}

$sql="SELECT user_order.*, users.account, product.price, product.name AS product_name FROM user_order
    JOIN users ON user_order.user_id = users.id
    JOIN product ON user_order.product_id = product.id
    $whereClause
    ORDER BY user_order.id DESC
    ";


$result = $conn->query($sql);
$productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);



?>
<!doctype html>
<html lang="en">

<head>
  <title>Order List</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <?php if(isset($_GET["date"]) || isset($_GET["product_id"]) || isset($_GET["user_id"]) || isset($_GET["startDate"])): ?>
    <div class="py-2">
        <a class="btn btn-info" href="order-list.php">Back</a>
    </div>
    <?php endif; ?>
    <div class="py-2">
        <form action="">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <input type="date" class="form-control"
                    name="startDate"
                    value="<?php
                    if(isset($_GET["startDate"]))echo $_GET["startDate"];
                    ?>"
                    >
                </div>
                <div class="col-auto">
                    to
                </div>
                <div class="col-auto">
                <input type="date" class="form-control"
                    name="endDate"
                    value="<?php
                    if(isset($_GET["endDate"]))echo $_GET["endDate"];
                    ?>"
                    >
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
                    <th>id</th>
                    <th>訂購日期</th>
                    <th>產品名稱</th>
                    <th>訂購數量</th>
                    <th>訂購者</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $data): ?>
                    <tr>
                        <td>
                            <a href="order-detail.php?id=<?=$data["id"]?>"><?=$data["id"]?></a>
                        </td>
                        <td>
                            <a href="order-list.php?date=<?=$data["order_date"]?>"><?=$data["order_date"]?></a>
                        </td>
                        <td>
                            <a href="order-list.php?product_id=<?=$data["product_id"]?>"><?=$data["product_name"]?></a>
                        </td>
                        <td><?=$data["amount"]?>
                        </td>
                        <td>
                            <a href="order-list.php?user_id=<?=$data["user_id"]?>"><?=$data["account"]?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </div>
</body>

</html>