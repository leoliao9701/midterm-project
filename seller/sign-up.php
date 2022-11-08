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

<body>
  <div class="container">
    <form action="doSignUp.php" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">註冊</h1>
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
                <button class="btn btn-secondary" type="submit">送出</button>
            </div>
        </div>
    </form>
  </div>
</body>

</html>