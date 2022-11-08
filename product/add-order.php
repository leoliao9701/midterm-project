<!doctype html>
<html lang="en">

<head>
  <title>Add Order</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <!-- 
        目前做的東西屬於crud(create read update delete) 
    -->
    <div class="container">
        <div class="py-2">
        <a class="btn btn-info" href="order-list.php">Order List</a>
        </div>

        <form action="doInsert.php" method="post">
            <div class="mb-2">
                <label for="Product">Product</label>
                <input type="text" class="form-control"
                id="product_id"
                name="product_id"
                >
            </div>
            <div class="mb-2">
                <label for="User">User</label>
                <input type="text" class="form-control"
                id="user_id"
                name="user_id"
                >
            </div>
            <div class="mb-2">
                <label for="Amount">Amount</label>
                <input type="text" class="form-control"
                id="amount"
                name="amount"
                >
            </div>
            <div class="mb-2">
                <label for="Order_date">Order_date</label>
                <input type="date" class="form-control"
                id="order_date"
                name="order_date"
                >
            </div>
            <div class="mb-2">
                <label for="Payment">Payment</label>
                <select class="btn btn-successed" id="Payment" name="Payment" >
                <option value="linePay">LinePay</option>
                <option value="bank">Bank</option>                
                </select>
                <!-- <input type="text" class="form-control"
                id="payment"
                name="payment"
                > -->
            </div>
            <div class="mb-2">
                <label for="Address">Address</label>
                <input type="text" class="form-control"
                id="send_address"
                name="send_address"
                >
            </div>
            <div class="mb-2">
                <label for="Coupon">Coupon</label>
                <input type="text" class="form-control"
                id="coupon"
                name="coupon"
                >
            </div>
            <button class="btn btn-info" type="submit">送出</button>
        </form>
    </div>
</body>

</html>