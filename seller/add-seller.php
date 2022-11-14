<!doctype html>
<html lang="en">

<head>
  <title>add seller</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
   body{
    background-image: url(https://images.pexels.com/photos/2249961/pexels-photo-2249961.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
    background-size:cover cover;
    background-repeat:no-repeat;
    background-position:center center;
   
  }
  .wrap{
    padding:10px;
    margin:50px auto;
    width:500px;
    height:400px;
    background-Color: rgba(254,223,225,0.5);
    border-radius:5pt;
  }
</style>

<body>
  <!-- 新增資料頁面 -->
  <div class="container">
    <div class="wrap">
    <div class="py-2"><a class="btn btn-dark" href="sellers.php">seller List</a></div>
    <form action="doInsert.php" method="post">
      
        <div class="mb-2">
            <label for="account">Account</label>
            <input type="text" class="form-control" id="account" name="account">
        </div>
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-2">
            <label for="phone">phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-2">
            <label for="email">email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <button class="btn btn-dark" type="submit">送出</button>
    </form>
    </div>
  </div>
</body>

</html>