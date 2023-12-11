<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Complete!</title>
    <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
</head>
  
</head>
<body>
@include ('header ')

</body>
<div class="row">
  <div class="col-75">
    <div class="container" >

        <div class="row" >
          <div class="col-50" style = "background-color: gray"  >
            <h1>SUCCESS!</h1>
            <div class="row">

              <div class="col-50" >
                    <p>Your order has been confirmed!</p>
                    <br>
                    <p>Sit tight and wait. In order to track your order, here is your <b>tracking number:</b></p>
                    <hr>
                    <?php
                    // use Illuminate\Support\Str;
                    // $random = Str::random(10);
                    $random = uniqid();
                    echo "<h3>". $random . "</h3>";
                    ?>
                    <br>
                    <p>We'll send you an email confirming all the details</p>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Delivery Address</h3>
            <hr>
            <h3>Billing Address</h3>
            <hr>
            <h3>Contact Details</h3>
            </div>
          </div>

        </div>
    </div>
  </div>

</html>