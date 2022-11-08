<!doctype html>
<html lang="en">

<head>
  <title>Sign Up</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">註冊</h1>
                <div class="mb-2">
                    <label for="account">帳號</label>
                    <input type="text" class="form-control" 
                    id="account"
                    name="account"  minlength="4" maxlength="20">
                </div>
                <div class="mb-2">
                    <label for="password">密碼</label>
                    <input type="password" class="form-control" 
                    id="password"
                    name="password">
                </div>
                <div class="mb-2">
                    <label for="repassword">再輸入一次密碼</label>
                    <input type="password" class="form-control"
                    id="repassword" name="repassword">
                </div>
                <button class="btn btn-secondary" type="button" id="send">送出</button>
            </div>
        </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script>
    const sendBtn=document.querySelector("#send")
    const account=document.querySelector("#account")
    const password=document.querySelector("#password")
    const repassword=document.querySelector("#repassword")


    sendBtn.addEventListener("click", function(){
        // console.log("click")
        let accountVal=account.value, passwordVal=password.value, repasswordVal=repassword.value;

        $.ajax({
                method: "POST", //or GET
                url: "/api/doSignUp.php",
                dataType: "json",
                data: {
                    account: accountVal,
                    password: passwordVal,
                    repassword: repasswordVal
                }
            })
            .done(function(response) {
                console.log(response)
                if(response.status==0){
                    alert(response.message)
                }else{
                    alert(response.message)
                    location.href="users.php"
                }
                
            }).fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

    })
  </script>
</body>

</html>