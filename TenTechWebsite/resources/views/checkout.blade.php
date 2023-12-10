<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
    <style>

</style>    
</head>
<body>
@include ('header ')

</body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> Town/City</label>
            <input type="text" id="city" name="city" placeholder="">

            <div class="row">

              <div class="col-50">
                <label for="zip">Post Code</label>
                <input type="text" id="post" name="post" placeholder="">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>

            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Date</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="MM/YY">
            <div class="row">
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
              </div>
            </div>
          </div>

        </div>
       <a href = "complete"> <input type="button" value="Continue to checkout" class="btn" ></a>
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>1</b>
        </span>
      </h4>
      <p><a href="#" style="color:black">JPhone</a> <span class="price">£1000</span></p>
      <hr>
      <p>Estimated Shipping<span class = "price" style = "color:black"><b>£30</b></span></p>
      <p>Total <span class="price" style="color:black"><b>£1030</b></span></p>
    </div>
  </div>
</div> 
</html>