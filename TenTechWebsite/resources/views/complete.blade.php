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
    <div class="container">

      <div class="row">
        <div class="col-50" style="background-color: gray">
          <h1>SUCCESS!</h1>
          <div class="row">

            <div class="col-50">
              <p>Your order has been confirmed!</p>
              <p>Sit tight and wait. In order to track your order, here is your <b>tracking number:</b></p>
              <hr>
              <strong>
                <form action="{{ route('order-details', ['id' => $order->tracking_number]) }}" method="post">
                  @csrf
                  <button type="submit" class="text-dark" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                    <h2>Click here to track your order</h2>
                    <h2>Order ID: {{ $order->tracking_number }}</h2>
                    <input type="hidden" name="id" value="{{ $order->tracking_number }}">
                  </button>
                </form>
              </strong>
              <hr>
              <p>We'll send you an email confirming all the details</p>
            </div>
          </div>
        </div>

        <div class="col-50">
          <h3>Delivery Address</h3>
          <p>Address Line 1: {{ $order->address_line_1 }}</p>
          <p>Address Line 2: {{ $order->address_line_2 }}</p>
          <p>City: {{ $order->city }}</p>
          <p>Post Code: {{ $order->post_code }}</p>
          <p>Country: {{ $order->country }}</p>
          <hr>
          <h3>Contact Details</h3>
          <p>Email: {{ auth()->user()->email }}</p>
          <hr>
          <h3>Payment Details</h3>
          <p>Card Holder Number: XXXX XXXX XXXX {{ substr($userPayments->card_number, -4) }}</p>
          <p>Card Holder Name: {{ strtoupper($userPayments->card_holder_name) }}</p>
          <p>Expiry Date: {{ $userPayments->expiry_date }}</p>
          <hr>
          <h3>Order Summary</h3>
          <p>Total Before Discount: <strong>£{{ number_format($order->total_before_discount, 2) }}</strong></p>
          <p>Discount Amount: <strong>£{{ number_format($order->discount_amount, 2) }}</strong></p>
          <p>Total After Discount: <strong>£{{ number_format($order->total_after_discount, 2) }}</strong></p>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
</html>