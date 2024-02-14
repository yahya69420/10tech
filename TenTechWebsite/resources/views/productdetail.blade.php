<!-- resources/views/your-view.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/productdetail.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <label for="quantity">Quantity:</label>
            <select id="quantity" name="quantity">
            <!-- You can dynamically generate options based on available stock -->
                @for ($i = 1; $i <= $product->stock; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
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
                <input type="text" name="product_name" value="{{ $product->name }}" hidden>
                @if($product->stock > 0) 
                <label for="quantity">Quantity:</label>
                <select id="quantity" name="quantity">
                    @for ($i = 1; $i <= $product->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <h4><span class="badge rounded-pil bg-success">{{ $product->stock }} In Stock</span></h4>
                <button type="submit">Add to Basket</button>
                @else
                <h4><span class="badge rounded-pil bg-danger">Out of Stock</span></h4>
                <button type="submit">Add to wishlist</button>
                @endif
            </form>
            @dump(session()->all())
            @if(session('successfulladdition'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
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
                    title: "{{ session('successfulladdition') }}",
                });
            </script>
            @endif
        </div>
    </div>
</body>

</html>