<?php
require_once("../db2-connect.php");
session_start();

if(!isset($_SESSION["user"])){
  header("location: login.php");
}
// $page=$_GET["page"];

if(isset($_GET["search"])){
  $search=$_GET["search"];
  $sql="SELECT * FROM users WHERE account LIKE '%$search%' AND valid=1 ORDER BY created_at DESC";
  $result=$conn->query($sql);
  $userCount=$result->num_rows;

}else{
  if(isset($_GET["page"])){
    $page=$_GET["page"];
  }else{
    $page=1; 
  }

  $sqlAll="SELECT * FROM users WHERE valid=1 ";
  $resultAll=$conn->query($sqlAll);
  $userCount=$resultAll->num_rows;
  
  $per_page=5;
  $page_start=($page-1)*$per_page;

  $sql="SELECT * FROM users WHERE valid=1 ORDER BY created_at DESC LIMIT $page_start, $per_page";

  $result=$conn->query($sql);

  //計算頁數
  $totalPage=ceil($userCount/$per_page);  //無條件進位

}

$rows=$result->fetch_all(MYSQLI_ASSOC);  //關聯式陣列

// $rows2=$result->fetch_all(MYSQLI_NUM);
// var_dump($rows2);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <title>Users</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    
    <div class="py-2 d-flex justify-content-between">
      <a class="btn btn-secondary mx-2" href="./dashboard.php">Go Back</a>
      <a class="btn btn-secondary mx-2" href="add-user.php">Add User</a>
        
    </div>

    <div class="py-2">
      <form action="users.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search">
          <button type="submit" class="btn btn-secondary">搜尋</button>
        </div>
      </form>
    </div>

    <?php if(isset($_GET["search"])): ?>
      <div class="py-2">
        <a class="btn btn-secondary" href="users.php">回使用者列表</a>
      </div>
      <h1><?=$_GET["search"]?>的搜尋結果</h1>
    <?php endif; ?>
    <div class="py-2"> 
        共 <?=$userCount?> 人
    </div>
    <!-- <?php var_dump($row)?> -->
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>account</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th></th>
                </tr>
            </thead>
            <?php if($userCount>0): ?>
            <tbody>
            <?php foreach($rows as $row): ?>
              <tr>
                <td><?=$row["id"]?></td>
                <td><?=$row["account"]?></td>
                <td><?=$row["name"]?></td>
                <td><?=$row["phone"]?></td>
                <td><?=$row["email"]?></td>
                <td>
                  <a class="btn btn-secondary" href="user.php?id=<?=$row["id"]?>">檢視</a>
                  <a class="btn btn-danger" href="delete-user.php?id=<?=$row["id"]?>">刪除</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <?php endif; ?>
    </table>
    <?php if(!isset($_GET["search"])): ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for($i=1; $i<=$totalPage; $i++): ?>
        <li class="page-item <?php if($i==$page)echo "active"; ?>"><a class="page-link" href="users.php?page=<?=$i?>"><?=$i?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
    <?php endif ;?>
  </div>
</body>

</html>