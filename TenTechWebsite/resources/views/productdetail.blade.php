<!-- resources/views/your-view.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/productdetail.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/product_rating_review.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title> {{$product->name}}</title>
</head>

<body>
    @include('header')

    <section class="container sproduct my-5 pt-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row mt-3 ">
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="image-frame">
                                <img class="img-fluid " src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="margin-bottom: 20px;">
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12 col-12">
                            <div class="product-details">
                                <h3 class="solid-heading"> {{ $product->name }}</h3>

                                <!-- Displaying Star Ratings Based on Reviews -->
                                @php $ratenum = number_format($rating_value) @endphp <!-- Format and store the average rating value -->
                                <div class="rating">
                                    <!-- Generate filled stars for the average rating -->
                                    @for($i = 1; $i<= $ratenum; $i++ ) <i class="fa fa-star checked"></i> <!-- Display a filled star for each point in the average rating -->
                                        @endfor
                                        <!-- Generate empty stars for the remainder up to 5 -->
                                        @for($j = $ratenum+1; $j <= 5; $j++ ) <i class="fa fa-star "></i> <!-- Display an empty star for each point missing to reach 5 -->
                                            @endfor

                                            <span>
                                                @if($ratings -> count() > 0)
                                                {{ $ratings -> count()}} Ratings <!-- Show the total number of ratings if available -->
                                                @else
                                                No Ratings <!-- Display 'No Ratings' if there are no ratings -->
                                                @endif
                                            </span>
                                </div>


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
                        </div>
                    </div>
                </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <h4>Product Description</h4>
                                <p style="font-size:15px">{{ $product->description }}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Rate this Product
                                    </button>

                                    <a href="{{ url('add-review/'.$product->id.'/userreview')}}" class="btn btn-link">
                                        write Review
                                    </a>

                                </div>

                                <div class="col-md-4">
                                    <label for=""> Rahul Vasantlal </label>
                                    <a href=""> edit </a>
                                    <br>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star "></i>
                                    <small>Reviewed on 27 Aug 2021</small>
                                    <p>
                                        Product was good and fast deliver
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>



    @include('layouts/footer')

    <!-- Modal for Rating Submission -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Rating submission form -->
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf <!-- CSRF token for security -->
                    <input type="hidden" name="product_id" value="{{$product->id}}"> <!-- Hidden field for product ID -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{$product->name}}</h1> <!-- Modal title with product name -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Close button -->
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <!-- Dynamically generate radio buttons for user rating -->

                                @if($user_rating) <!-- If there's an existing user rating -->
                                @for($i = 1; $i<= $user_rating->stars_rated; $i++ ) <!-- Filled stars for existing rating -->
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    @for($j = $user_rating->stars_rated+1; $j <= 5; $j++ ) <!-- Empty stars for remaining rating -->
                                        <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                        <label for="rating{{$j}}" class="fa fa-star"></label>
                                        @endfor

                                        @else <!-- Default star ratings for no existing rating -->
                                        @for($i = 1; $i <= 5; $i++) <!-- Generate 5 stars for rating -->
                                            <input type="radio" value="{{$i}}" name="product_rating" id="rating{{$i}}" {{$i == 1 ? 'checked' : ''}}>
                                            <label for="rating{{$i}}" class="fa fa-star"></label>
                                            @endfor
                                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- This part of the code displays the model for ratings and reviews using sweet alerts and bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('status'))
    <script>
        Swal.fire({
            text: "{{ session('status') }}",
        });
    </script>
    @endif



</body>

</html>