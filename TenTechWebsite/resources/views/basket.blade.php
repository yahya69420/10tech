<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../resources/css/basketPage.css') }}">
    <!-- Added icon for website -->
    <link rel="icon" href="{{ asset('icons8-register-16.png') }}" type="image/x-icon" />
    <!-- Bootstrap CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Roboto Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <!-- animate.css CDN -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BoxIcon CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Basket</title>
    <style>
        /* remove any default padding and margins to avoid 
any issues that are impossible to debug later; make this universal*/

        /* For clarity, use of tailwind utilities were chosen against here 
so that the css was more easier to read and could be applied 
universally as is the case here :) */

        /* default padding and border arithemetic is like so: 
    - width = width + padding + border
    - height = height + padding + border
    border-box removes this for easier arithmetic and modifications when needed */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html:root {
            background-color: rgb(238, 238, 238);
        }

        body,
        html {
            font-family: "Roboto", sans-serif;
            color: black;
            display: flex;
            flex-direction: row;
        }

        body {
            /* change the background to default to light mode */
            background-color: rgb(238, 238, 238);
            display: flex;
        }

        #myBagCardId {
            background-color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin: 20px;
            width: auto;
            max-height: 100%;
            margin-top: 100px;
            /*Set a fixed height for the container/*
    
    /*
    Use overflow-auto to add scrollbars to an element in the event that its content 
    overflows the bounds of that element. Unlike overflow-scroll, which always shows 
    scrollbars, this utility will only show them if scrolling is necessary.*/

            overflow-y: auto;
            /* ennabele vertical scrolling */
            margin-left: 250px;
            margin-right: auto;

        }

        .itemList {
            list-style: none;
            padding: 10px;
            border: rgb(22, 21, 21);
        }

        .productItem {
            display: flex;
            align-items: center;
            justify-content: start;
            padding: 10px 0;
            /* Add padding to separate items */
            border-bottom: 1px solid #242424;
        }

        #blackLine {
            border: 1px solid rgb(255, 255, 255);
            background-color: rgb(255, 255, 255);
            height: 2px;
        }

        .productImage {
            height: auto;
            width: 80px;
            margin-right: 20px;
        }

        .productInfo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
        }

        .pName,
        .pQuantity,
        .pPrice {
            margin-bottom: 10px;
        }

        .quantityDropdown {
            margin-right: 10px;
            background-color: white;
        }

        .removeButton {
            display: flex;
            justify-content: flex-end;
            flex-grow: 0;
            margin-top: 35px;
            margin-left: 20px;

        }

        .subTotal {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* delivery section styling */

        #deliveryCardId {
            background-color: rgb(238, 238, 238);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
            width: 313px;
            height: 160px;
        }

        .deliveryForm label {
            display: block;
        }

        .deliveryForm input[type="radio"] {
            background-color: white;
        }


        #totalCardId {
            background-color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            align-items: stretch;
            margin-top: 0px;
            width: fit-content;
            height: fit-content;
        }

        .rightSide {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin: 20px;
            width: fit-content;
            height: fit-content;
            margin-top: 100px;

        }

        #promoCodeInput {
            background-color: rgb(255, 255, 255);
        }

        .totalInfo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }


        .checkoutButton {
            background-color: #049f47;

        }
        header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; 
}
    </style>
</head>



<body>
    @include('header')


    <div class="myBagCard p-5 rounded-md w-2/4 shadow-2xl" id="myBagCardId">
        <!-- Card title -->
        <h1 class="text-3xl font-bold text-center p-5 pb-0 mb-4">My Bag </h1>
        <ul class="itemList">
            @foreach ($cartItems as $cartItem)
            <li class="productItem">
                <img class="productImage" src="{{ $cartItem->image }}">
                <div class="productInfo">
                    <a href="{{ route('productdetail', ['id' => $cartItem->id]) }}" style="color:rgb(0, 0, 0);  cursor: pointer;">
                        <div class="pName font-bold">{{ $cartItem->name }}</div>
                    </a>
                    <form action="{{ route('update_cart', ['cart_id' => $cartItem->cart_id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $cartItem->cart_id }}">
                        <input type="hidden" name="product_id" value="{{ $cartItem->id }}">
                        <input type="hidden" name="product_name" value="{{ $cartItem->name }}">
                        <input type="hidden" name="product_price" value="{{ $cartItem->price }}">
                        <input type="hidden" name="product_stock" value="{{ $cartItem->stock }}">
                        <input type="hidden" name="product_image" value="{{ $cartItem->image }}">
                        @if(session('discount'))
                        <input type="hidden" name="promo_code" id="promoCodeInput" placeholder="Enter promo code" class="input input-bordered" value="{{ session('discount')->code }}" />
                        @else
                        <input type="hidden" name="promo_code" id="promoCodeInput" placeholder="Enter promo code" class="input input-bordered" />
                        @endif
                        <div class="pQuantity font-bold">
                            Quantity:
                            <select class="quantityDropdown productQuantity" data-price="{{ $cartItem->price }}" data-cart-id="{{ $cartItem->cart_id }}" name="product_quantity">
                                @for ($i = 1; $i <= $cartItem->stock && $i <= $cartItem->cart_quantity + 5; $i++) <option value="{{ $i }}" {{ $cartItem->cart_quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                            </select>
                        </div>
                        <div class="updateButton">
                            <button class="btn btn-active   hover:bg-green-700 text-black">Update Cart</button>
                        </div>
                    </form>
                    <div class="pPrice pSubtotal font-bold">£{{ number_format($cartItem->price * $cartItem->cart_quantity, 2) }}</div>
                </div>
                <div class="removeButton">
                    <a href="{{ route('remove_from_basket', ['cart_id' => $cartItem->cart_id]) }}">
                        <button class="btn btn-active bg-red-500 hover:bg-red-700 text-white">Remove</button>
                    </a>
                </div>
                @endforeach
            </li>
        </ul>
        @php
        $total = 0;
        @endphp

        @foreach ($cartItems as $cartItem)
        @php
        $total += $cartItem->price * $cartItem->cart_quantity;
        @endphp
        @endforeach

        <div class="subTotal">
            <div class="subtotalInfo">
                <h1 class="font-bold text-xl mt-2">SUBTOTAL</h1>
            </div>
            @if(session('discount'))
            <h2 class="font-bold text-l mt-2 ml-2" id="overallSubtotal">£{{ number_format($total, 2) }}</h2>
            @else
            <h2 class="font-bold text-l mt-2 ml-2" id="overallSubtotal">£{{ number_format($total, 2) }}</h2>
            @endif
        </div>


    </div>

    <div class="rightSide">


        <div class="totalCard p-5 mt-0 pt-0 rounded-md shadow-2xl" id="totalCardId">
            <div class="totalCardPromoField">
                <h1 class="text-3xl font-bold text-center pb-0">Total</h1>

                <form action="apply_discount" method="post">
                    @csrf
                    <p class="text-md font-medium text-left p-1 pb-0 mb-0.5">Promo Code</p>
                    <div class="promoCodeField">
                        @if(session('discount'))
                        <p style="margin-bottom: 10px; color: #049f47; font-weight: bold;">
                            {{ session('discount')->code }} has been applied
                        </p>
                        <input style="border: 2px solid #049f47; padding: 8px; width: 200px; box-sizing: border-box;" type="text" name="promo_code" id="promoCodeInput" placeholder="Enter promo code" class="input input-bordered" value="{{ session('discount')->code }}" readonly />
                        <button type="submit" id="removePromoCode" class="btn btn-active" formaction="remove_discount">Remove</button>
                        @else
                        <input type="text" name="promo_code" id="promoCodeInput" placeholder="Enter promo code" class="input input-bordered" />
                        @endif
                        <button type="submit" id="applyPromoCode" class="btn btn-active">Apply</button>
                    </div>
                </form>
            </div>
            <div class="deliveryCard ">
                <hr id="blackLine">

                <div class="deliveryForm text-xl font-bold">
                    <form action="#" method="POST">

                        <label for="deliveryOption1">
                            <input type="radio" id="deliveryOption1" name="deliveryOption" value="option1" checked>
                            Delivery Option 1
                        </label>

                        <label for="deliveryOption2">
                            <input type="radio" id="deliveryOption2" name="deliveryOption" value="option2">
                            Delivery Option 2
                        </label>

                    </form>

                </div>


            </div>

            <div class="totalInfo">
                <div class="leftsideInfo">
                    <h2 class="font-bold text-xl mt-2">Estimated shipping costs</h2>
                    <hr id="blackLine">
                    @if(session('discount') && session('discount')->type == 'percentage')
                    <h2 class="font-bold text-xl mt-2">Discounts ({{ session('discount')->value }}%)</h2>
                    @else
                    <h2 class="font-bold text-xl mt-2">Discounts</h2>
                    @endif
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2">SUBTOTAL</h2>
                    <hr id="blackLine">
                </div>

                <div class="rightsideInfo">
                    <h2 class="font-bold text-xl mt-2 ml-2" id="deliveryCosts">£0.00</h2>
                    <hr id="blackLine">
                    @if(session('discount'))
                    <h2 class="font-bold text-xl mt-2 ml-2">£{{ number_format(session('discountTotal'), 2) }}</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2 ml-2" id="overallSubtotal2">£{{ number_format(session('totalAmount'), 2) }}</h2>
                    @else
                    <h2 class="font-bold text-xl mt-2 ml-2">£0.00</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2 ml-2" id="overallSubtotal2">£{{ number_format($total, 2)}}</h2>
                    @endif
                </div>
            </div>
            @if (DB::table('cart')->where('user_id', auth()->user()->id)->count() == 0)
            <p class="text-red-500 font-bold">The cart is empty</p>
            <a href="{{ url('shop') }}">
                <button class="checkoutButton btn btn-active text-white mt-2">CONTINUE SHOPPING</button>
            @else
            <a href="checkout">
                <button class="checkoutButton btn btn-active text-white mt-2">CONTINUE</button>
            </a>
            @endif
        </div>
    </div>
</body>



@if(session('success'))
<script>
    Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.resumeTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "{{ session('success') }}",
    });
</script>
@endif

@if(session('error'))
<script>
    Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.resumeTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "error",
        title: "{{ session('error') }}",
    });
</script>
@endif


</html>