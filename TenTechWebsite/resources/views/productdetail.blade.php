<!-- resources/views/your-view.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/productdetail.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>

<body>
    @include('header')

    <section class="container sproduct my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <div class="image-frame">
                    <img class="img-fluid " src="{{ $product->image }}" alt="{{ $product->name }}" style="margin-bottom: 20px;">
                </div>
            </div>

            <div class="col-lg-7 col-md-12 col-12">
                <div class="product-details">
                    <h3 class="solid-heading"> {{ $product->name }}</h3>
                    <h5 class="price-head">Price: £{{ $product->price }}</h5>
                    <div class="add-to-cart">
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
                                @if ($product->stock > 10)
                                <!-- changed to less/equal to 10 for simplicity -->
                                @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    @else
                                    @for ($i = 1; $i <= $product->stock; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        @endif

                            </select>
                            @if ($product->stock > 10)
                            <h4><span class="badge rounded-pil bg-success">{{ $product->stock }} In Stock</span></h4>
                            <button type="submit">Add to Basket</button>
                            
                            @elseif ($product->stock <= 10 && $product->stock > 0)
                                <h4><span class="badge rounded-pil bg-warning">{{ $product->stock }} Products in stock</span></h4>
                                <h4><span class="badge rounded-pil bg-warning">Low Stock</span></h4>
                                <button type="submit">Add to Basket</button>
                                @endif
                                @endif
                                @if ($product->stock == 0)
                                <h4><span class="badge rounded-pil bg-danger">Out of Stock</span></h4>
                                <button type="submit">Add to wishlist</button>
                                @endif
                                
                        </form>
                        <!-- @dump(session()->all()) -->

                    </div>
                    <h4>Product Details</h4>
                    <p style="font-size:15px">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </section>



    {{--
    <div class="product-container">
        <div class = "row">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </div>
    <div class="product-details">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->category }}</p>
        <p>{{ $product->description }}</p>
        <hr> <!-- Divider - Price-->
        <p>£{{ $product->price }}</p>
        <hr> <!-- Divider -size,quantity-->
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
                @if ($product->stock > 10)
                <!-- changed to less/equal to 10 for simplicity -->
                @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    @else
                    @for ($i = 1; $i <= $product->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        @endif
            </select>
            <h4><span class="badge rounded-pil bg-success">{{ $product->stock }} In Stock</span></h4>
            <button type="submit">Add to Basket</button>
            @elseif ($product->stock <= 10 && $product->stock > 0)
                <h4><span class="badge rounded-pil bg-warning">{{ $product->stock }} Products in stock</span></h4>
                <h4><span class="badge rounded-pil bg-warning">Low Stock</span></h4>
                <button type="submit">Add to Basket</button>
                @else
                <h4><span class="badge rounded-pil bg-danger">Out of Stock</span></h4>
                <button type="submit">Add to wishlist</button>
                @endif
        </form>
        @dump(session()->all())
        @if(session('successfulladdition'))
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
                title: "{{ session('successfulladdition') }}",
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
    </div>
    </div>
    --}}

    @include('layouts/footer')
</body>

</html>