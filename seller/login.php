<?php
session_start();
if(isset($_SESSION["seller"])){
    header("location: dashboard.php");
}



?>


<!doctype html>
<html lang="en">

<head>
  <title>login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        
        .login-panel{
            width: 320px;
            /* background: #eee; */
        }
        .logo{
            width: 64px;
        }
        .floating-top .form-control{
            border-radius: .375rem .375rem 0 0;
        }
        .form-control:focus{
            position: relative;
            z-index: 1;
        }
        .form-floating>label{
            z-index: 2;
        }
        .floating-bottom .form-control{
            border-top: none;
            border-radius: 0 0 .375rem .375rem ;

        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="login-panel text-center">
            <!-- <img class="logo mb-3" src="/images/bootstrap-logo.svg" alt=""> -->
            <h1>賣家登入</h1>
            <?php if(isset($_SESSION["error"]) && $_SESSION["error"]["times"]>=5): ?>
              <div class="text-center h3">
                您已超過登入錯誤次數，請稍後再登入
              </div>
            <?php else: ?>
            <form action="doLogin.php" method="post">
            <div class="text-start-mt-3">   
            <div class="form-floating floating-top">
                <input type="text" class="form-control" id="floatingInput" placeholder="Account" name="account">
                <label for="floatingInput">Account</label>
              </div>
              <div class="form-floating floating-bottom">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              <?php if(isset($_SESSION["error"])): ?>
              <div class="pt-2 text-danger">
                  <?=$_SESSION["error"]["message"] ?>
                  <?php
                  //echo $_SESSION["error"]["times"];檢查錯誤次數
                    $_SESSION["error"]["message"]="";
                      //重整後 不會再出現錯誤提示
                  ?>
                  <!-- 帳號或密碼錯誤 -->
              </div>
              <?php endif; ?>
            </div>
            <div class="py-3 d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Remember Me
                    </label>
                </div>
            </div>
            <div class="d-grid mb-4" >
                <button type="submit" class="btn btn-primary" type="button">登入</button>
              </div>
            <div class="d-grid mb-4" >
              <a href="./sign-up.php" class="btn btn-primary" type="button">註冊</a>
            </div>
              </form>
              <?php endif; ?>
              <div class="">© 2017–2022</div>
        </div>
    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>