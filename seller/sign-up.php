<!doctype html>
<html lang="en">

<head>
  <title>Sign-up</title>
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
    padding:20px;
    margin:50px auto;
    width:700px;
    height:600px;
    background-Color: rgba(254,223,225,0.5);
    border-radius:5pt;
  }
  h1{
    margin-top:30px;
  }
  a{
    text-decoration: none ;
    color:white;
  }

</style>


<body>
  <div class="container">
    <div class="wrap">
    <form action="doSignUp.php" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">歡迎註冊藝拍！</h1>
                <div class="mb-2">
                    <label for="name">姓名</label>
                    <input type="name" class="form-control" name="name" require>
                </div>
                <div class="mb-2">
                    <label for="phone">手機</label>
                    <input type="phone" class="form-control" name="phone" require>
                </div>
                <div class="mb-2">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" require>
                </div>


                <div class="mb-2">
                    <label for="account">帳號</label>
                    <input type="text" class="form-control" name="account" require minlength="4" maxlength="20">
                </div>
                <div class="mb-2">
                    <label for="password">密碼</label>
                    <input type="password" class="form-control" name="password" require>
                </div>
                <div class="mb-2">
                    <label for="repassword">再輸入一次密碼</label>
                    <input type="password" class="form-control" name="repassword" require>
                </div>
                <button class="btn btn-dark" type="submit">送出</button>
                <button class="btn btn-dark"><a href="login.php">回到登入頁</a></button>
                
            </div>
        </div>
    </form>
    
  </div>
  </div>
</body>

</html>