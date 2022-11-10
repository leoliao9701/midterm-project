<!doctype html>
<html lang="en">

<head>
    <title>Sign-up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {

            background-image: url(../images/25.jpg);
            background-size: cover;
            color: white;
        }

        h1 {
            color: white;
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <form action="doSignUp.php" method="post">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <h1 class="text-center">會員註冊</h1>
                        <div class="mb-2">
                            <label for="name">姓名</label>
                            <input type="name" class="form-control" name="name" placeholder="請輸入姓名" require>
                        </div>
                        <div class="mb-2">
                            <label for="phone">手機</label>
                            <input type="phone" class="form-control" name="phone" placeholder="請輸入手機號碼" require>
                        </div>
                        <div class="mb-2">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="email" placeholder="請輸入電子信箱" require>
                        </div>


                        <div class="mb-2">
                            <label for="account">帳號</label>
                            <input type="text" class="form-control" name="account" placeholder="請設定4~20字元長度帳號" require minlength="4" maxlength="20">
                        </div>
                        <div class="mb-2">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" name="password" placeholder="請輸入密碼" require>
                        </div>
                        <div class="mb-2">
                            <label for="repassword">再輸入一次密碼</label>
                            <input type="password" class="form-control" name="repassword" placeholder="請再次確認密碼" require>
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                        <button class="btn btn-light opacity-75" type="submit">送出</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>