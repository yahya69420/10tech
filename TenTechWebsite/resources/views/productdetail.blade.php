<!-- resources/views/your-view.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/productdetail.css') }}">
    <title>Your Page Title</title>
</head>
<body>
    @include('header')
    <div class="product-container">
        <div class="product-image">
            <img src="{{ $product->gallery }}" alt="{{ $product->name }}">
        </div>
        <div class="product-details">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->category }}</p>
            <p>{{ $product->description }}</p>
            <p>{{ $product->price }}</p>
            <button>Add to Cart</button>
        </div>
    </div>
</body>
</html>
