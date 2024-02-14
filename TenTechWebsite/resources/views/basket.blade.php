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
    max-height: 100%; /*Set a fixed height for the container/*
    
    /*
    Use overflow-auto to add scrollbars to an element in the event that its content 
    overflows the bounds of that element. Unlike overflow-scroll, which always shows 
    scrollbars, this utility will only show them if scrolling is necessary.*/

    overflow-y: auto; /* ennabele vertical scrolling */
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
    padding: 10px 0; /* Add padding to separate items */
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
</style>
</head>



<body>
    <div class="myBagCard p-5 rounded-md w-2/4 shadow-2xl" id="myBagCardId">
        <!-- Card title -->
        <h1 class="text-3xl font-bold text-center p-5 pb-0 mb-4">My Bag (x items)</h1>
        @foreach ($products as $product)
        <ul class="itemList">
            <li class="productItem">
                <img class="productImage" src="{{ $product->image }}">
                <div class="productInfo">
                    <div class="pName font-bold">{{ $product->name }}</div>
                    <div class="pQuantity font-bold">
                        Quantity:
                        <select class="quantityDropdown productQuantity" data-price="{{ $product->price }}" class="qDrop">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <div class="pPrice pSubtotal font-bold">£{{ $product->price }}</div>
                </div>
                <div class="removeButton">
                    <a href="{{ route('remove_from_basket', ['cart_id' => $product->cart_id]) }}">
                        <button class="btn btn-active text-white">Remove</button>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>


        <div class="subTotal">
            <div class="subtotalInfo">
                <h1 class="font-bold text-xl mt-2">SUBTOTAL</h1>
            </div>
            <h2 class="font-bold text-l mt-2 ml-2" id="overallSubtotal">£0.00</h2>
        </div>


    </div>

    <div class="rightSide">
        <h1 class="text-3xl font-bold text-center pb-0">Delivery</h1>
        <div class="deliveryCard p-5 rounded-md shadow-2xl" id="deliveryCardId">
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

        <h1 class="text-3xl font-bold text-center pb-0">Total</h1>

        <div class="totalCard p-5 mt-0 pt-0 rounded-md shadow-2xl" id="totalCardId">
            <div class="totalCardPromoField">
                <p class="text-md font-medium text-left p-1 pb-0 mb-0.5">Promo Code</p>
                <div class="promoCodeField">
                    <input type="text" id="promoCodeInput" placeholder="Enter promo code" class="input input-bordered" />
                    <button id="applyPromoCode" class="btn btn-active">Apply</button>
                </div>
            </div>
            <div class="totalInfo">
                <div class="leftsideInfo">
                    <h2 class="font-bold text-xl mt-2">Estimated shipping costs</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2">Discounts</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2">SUBTOTAL</h2>
                    <hr id="blackLine">
                </div>
                <div class="rightsideInfo">
                    <h2 class="font-bold text-xl mt-2 ml-2" id="deliveryCosts">£0.00</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2 ml-2">£0.00</h2>
                    <hr id="blackLine">
                    <h2 class="font-bold text-xl mt-2 ml-2" id="overallSubtotal2">£0.00</h2>
                    <hr id="blackLine">
                </div>
            </div>
            <a href="checkout">
                <button class="checkoutButton btn btn-active text-white mt-2">CONTINUE</button>
            </a>
        </div>
    </div>
</body>


<script>
    // Function to calculate the total
    function calculateTotal() {
        let total = 0;


        document.querySelectorAll('.productQuantity').forEach(function(dropdown) {
            let quantity = Number(dropdown.value);
            let price = Number(dropdown.getAttribute('data-price'));
            let subtotal = quantity * price;
            total += subtotal;
        });




        document.getElementById('overallSubtotal').textContent = '£' + total.toFixed(2);
        document.getElementById('overallSubtotal2').textContent = '£' + total.toFixed(2);
    }

    // Add event listeners to the quantity dropdowns
    document.querySelectorAll('.productQuantity').forEach(function(dropdown) {
        dropdown.addEventListener('change', calculateTotal);
    });




    // Calculate the initial total
    calculateTotal();
</script>

</html>