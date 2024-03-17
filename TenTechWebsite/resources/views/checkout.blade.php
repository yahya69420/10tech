<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
  <script type="module" src="{{ asset('cardFormatterCheckoutPage.js') }}"></script>
  <style>

  </style>
</head>

<body>
  @include ('header ')

</body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="{{ route('completeorder') }}" method="post">
        @csrf
        <!-- checkbox -->
        @if ($userAddress->address_line_1 != null || $userAddress->address_line_2 != null || $userAddress->city != null || $userAddress->post_code != null || $userAddress->country != null)
        <label for="sameadr"></label>
        <input type="checkbox" id="sameadr" name="sameadr">Shipping address same as billing
        <script>
          // if the checkbox will be checked, just hide the shipping address fields
          document.getElementById('sameadr').addEventListener('change', function() {
            if (this.checked) {
              document.getElementById('bi').style.display = 'none';
              document.getElementById('sameAddressInfoShown').style.display = 'block';
            } else {
              document.getElementById('bi').style.display = 'block';
              document.getElementById('sameAddressInfoShown').style.display = 'none';
            }
          });
        </script>
        @endif
        <div class="row">
          <div class="col-50">
            <div class="addressInfoAlreadySame" id="sameAddressInfoShown" style="display: none;">
              <h1>Address Information</h1>
              <p>Address Line 1: {{ $userAddress->address_line_1 }}</p>
              <p>Address Line 2: {{ $userAddress->address_line_2 }}</p>
              <p>City: {{ $userAddress->city }}</p>
              <p>Post Code: {{ $userAddress->post_code }}</p>
              <p>Country: {{ $userAddress->country }}</p>
            </div>
            <div class="billing-info" id="bi" style="display: block;">
              <h3>Billing Address</h3>
              <!-- <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder=""> -->
              <label for="adr"><i class="fa fa-address-card-o"></i> Address Line 1</label>
              <input type="text" id="addressLine1" name="addressLine1" placeholder="">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address Line 2</label>
              <input type="text" id="addressLine2" name="addressLine2" placeholder="">
              <label for="city"><i class="fa fa-institution"></i> Town/City</label>
              <input type="text" id="city" name="city" placeholder="">
              <label for="country">Country</label>
              <select id="country" name="country">
                <option value="England">England</option>
                <option value="Scotland">Scotland</option>
                <option value="Wales">Wales</option>
                <option value="Northern Ireland">Northern Ireland</option>
              </select>

              <div class="row">

                <div class="col-50">
                  <label for="zip">Post Code</label>
                  <input type="text" id="postcode" name="postcode" placeholder="">
                </div>
              </div>
            </div>
          </div>

          <div class="col-50">
            @if ($userPayments->card_number != null || $userPayments->card_holder_name != null || $userPayments->expiry_date != null || $userPayments->cvv != null)
            <label for="samepay"></label>
            <input type="checkbox" id="samepay" name="samepay">Payment info is the same as saved info
            <script>
              // if the checkbox will be checked, just hide the shipping address fields
              document.getElementById('samepay').addEventListener('change', function() {
                if (this.checked) {
                  document.getElementById('pi').style.display = 'block';
                  // document.getElementById('samePaymentInfoShown').style.display = 'block';
                  document.getElementById('cname').value = '{{ $userPayments->card_holder_name }}';
                  document.getElementById('ccnum').value = '{{ $userPayments->card_number }}';
                  document.getElementById('expmonth').value = '{{ $userPayments->expiry_date }}';
                  document.getElementById('cvv').value = '{{ $userPayments->cvv }}';
                  document.getElementById('card_type_icon').className = 'card-icon fab fa-cc-' + '{{ $userPayments->card_type }}';
                  document.getElementById('card_type_icon').style.color = '{{ $userPayments->color }}';
                  document.getElementById('cname').readOnly = true;
                  document.getElementById('ccnum').readOnly = true;
                  document.getElementById('expmonth').readOnly = true;
                  document.getElementById('cvv').readOnly = true;
                } else {
                  document.getElementById('pi').style.display = 'block';
                  document.getElementById('samePaymentInfoShown').style.display = 'none';
                  document.getElementById('cname').value = '';
                  document.getElementById('ccnum').value = '';
                  document.getElementById('expmonth').value = '';
                  document.getElementById('cvv').value = '';
                  document.getElementById('card_type_icon').className = 'card-icon';
                  document.getElementById('cname').readOnly = false;
                  document.getElementById('ccnum').readOnly = false;
                  document.getElementById('expmonth').readOnly = false;
                  document.getElementById('cvv').readOnly = false;

                }
              });
            </script>
            @endif
            <div class="paymentInfoAlreadySame" id="samePaymentInfoShown" style="display: none;">
              <h1>Payment Information</h1>
              <p>Card Holder Name: {{ $userPayments->card_holder_name }}</p>
              <p>Card Holder Number: XXXX XXXX XXXX {{ substr($userPayments->card_number, -4) }}</p>
              <p>Expiry Date: {{ $userPayments->expiry_date }}</p>
            </div>
            <div class="payment-info" id="pi" style="display: block;">

              <h3>Payment</h3>

              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="">
              <label for="ccnum">Credit card number</label>
              <!-- <input type="text" id="ccnum" name="cardnumber" placeholder=""> -->
              <div class="input-group">
                <span class="input-group-prepend">
                  <i id="card_type_icon" class="card-icon"></i>
                </span>
                <style>
                  .card-icon {
                    font-size: 2rem;
                    margin-right: 5px;
                  }
                </style>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1234 1234 1234 1234" required>
                <input id="cardType" name="cardType" value="" hidden readonly required>
                <input id="cardColour" name="cardColour" value="" hidden readonly required>
                <label for="expmonth">Exp Date</label>
                <!-- <input type="text" id="expmonth" name="expmonth" placeholder="MM/YY"> -->
                <input type="text" id="expmonth" placeholder="06/26" maxlength="5" name="expmonth" required>
                <div class="row">
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <!-- <input type="text" id="cvv" name="cvv" placeholder=""> -->
                    <input type="text" id="cvv" placeholder="626" maxlength="3" name="cvv">
                  </div>
                </div>
              </div>
            </div>

          </div>
          @foreach ($cartItems as $cartItem)
          <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
          <input type="text" name="product_id" value="{{ $cartItem->product_id }}" hidden>
          <input type="text" name="quantity" value="{{ $cartItem->quantity }}" hidden>
          <input type="text" name="total" value="{{ $cartItem->total }}" hidden>
          @endforeach
          <input type="submit" value="Continue to checkout" class="btn">
          <!-- <a href="complete"> <input type="submit" value="Continue to checkout" class="btn"></a> -->
      </form>
    </div>
  </div>

  @php
  $totalItems = 0;
  $totalAmount = 0;
  @endphp

  @foreach ($cartItems as $cartItem)
  @php
  $totalItems += $cartItem->cart_quantity;
  $totalAmount += $cartItem->price * $cartItem->cart_quantity;
  @endphp
  @endforeach

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>{{ $totalItems }} Items</b>
        </span>
      </h4>

      @foreach ($cartItems as $cartItem)
      <p><a href="{{ route('productdetail', ['id' => $cartItem->id]) }}" style="color: blue; text-decoration: underline; cursor: pointer;">{{ $cartItem->name }} (x{{ $cartItem->cart_quantity }})</a> <span class="price">{{ $cartItem->price }}</span></p>
      <hr>
      @endforeach

      <p>Estimated Shipping<span class="price" style="color:black"><b>Free shipping</b></span></p>
      <hr>
      @if (session('discount'))
      @if (session('discount')->type == 'percentage')
      <p>Discount ({{ session('discount')->value }}%)<span class="price" style="color:black"><b>-£{{ number_format(session('discountTotal'), 2) }}</b></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>£{{ number_format(session('totalAmount'), 2) }}</b></span></p>
      @else
      <p>Discount <span class="price" style="color:black"><b>-£{{ number_format(session('discountTotal'), 2) }}</b></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>£{{ number_format(session('totalAmount'), 2) }}</b></span></p>
      @endif
      @else
      <p>Discount <span class="price" style="color:black"><b>£0.00</b></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>£{{ number_format($totalAmount, 2) }}</b></span></p>
      @endif
    </div>
  </div>

</div>

</html>