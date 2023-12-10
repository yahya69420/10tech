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
</head>



<body>
    <div class="myBagCard p-5 rounded-md w-2/4 shadow-2xl" id="myBagCardId">
        <!-- Card title -->
        <h1 class="text-3xl font-bold text-center p-5 pb-0 mb-4">My Bag (x items)</h1>
        <button class="addDummyProduct btn btn-active text-white mt-2" id="addDummyP" onclick="addDummyProduct()">Add dummy product</button>
        <ul class="itemList">
            <li class="productItem">
                @foreach ($products as $product)
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
                <button class="removeButton btn btn-error mx-2" onclick="removeDummyProduct()">Remove product</button>
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
            <button class="continueButton btn btn-active text-white mt-2">CONTINUE</button>
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

    function addDummyProduct() {
        let dummyProduct = document.createElement('li');
        dummyProduct.classList.add('productItem');
        dummyProduct.innerHTML = `
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
        <button class="removeButton btn btn-error mx-2" onclick="removeDummyProduct()">Remove product</button>
        `;
        document.querySelector('.itemList').appendChild(dummyProduct);
        calculateTotal();

    }

    function removeDummyProduct() {
        document.querySelector('.itemList').removeChild(document.querySelector('.productItem'));
        calculateTotal();
    }
    calculateTotal();
</script>

</html>