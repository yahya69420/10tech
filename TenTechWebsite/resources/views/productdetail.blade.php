<!-- resources/views/your-view.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/productdetail.css') }}">
    <title>{{ $product->name }}</title>
</head>
<body>
    @include('header')
    <div class="product-container">
        <div class="product-image">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <div class="product-details">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->category }}</p>
            <p>{{ $product->description }}</p>
            <p>£{{ $product->price }}</p>
            <!-- form to allow for product to be added to the cart database so it can be accessed
        and manipulated later -->
            <form action="{{ route('add_to_basket') }}" method="POST">
                <!-- 
                    From the Laravel documentation: Anytime you define a "POST", "PUT", "PATCH",
                     or "DELETE" HTML form in your application, you should include a hidden 
                     CSRF _token field in the form so that the CSRF protection middleware can 
                     validate the request. For convenience, you may use the @csrf Blade directive 
                     to generate the hidden token input field
                     Reference: https://laravel.com/docs/10.x/csrf
                 -->
                @csrf
                <!-- the product id  passed inas hidden input so it can be accessed in the conteoller -->
                <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                <button type="submit">Add to Basket</button>
            </form>
        </div>
    </div>
</body>
</html>
