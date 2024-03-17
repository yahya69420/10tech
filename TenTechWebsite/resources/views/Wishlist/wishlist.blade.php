<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10tech</title>
    <link rel="stylesheet" href="{{ asset('/css/headerstyle.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/wishlists.css') }}">


</head>

<body>

    @include ('header ')

    
    <div class="wishlist-container mt-5">
        <div class="wishlist-header">
            <h1>My Wishlist</h1><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="50px" width="50px" version="1.1" id="Capa_1" viewBox="0 0 471.701 471.701" xml:space="preserve">
            <g>
                <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1   c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3   l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4   C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3   s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4   c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3   C444.801,187.101,434.001,213.101,414.401,232.701z"/>
            </g>
            </svg>
            @if(Auth::check())
                @if($wishlist->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Your wishlist is empty.
                    </div>
                    <a href="http://localhost/10tech/TenTechWebsite/public/shop" class="start-shopping-btn">START SHOPPING</a>
                @else
                    @foreach ($wishlist as $item)
                    <hr>
                    <div class="row text-center d-flex align-items-center justify-content-center">
                        
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset($item->products->image) }}" height="100px" width="100px" alt="Image here">
                        </div>

                        <div class="col-md-2 my-auto">
                            <a href="{{ route('productdetail', ['id' => $item->products->id]) }}" class="link">{{ $item->products->name }}</a>
                        </div>

                        <div class="col-md-2 my-auto">
                            
                            @if ($item->product && $item->product->stock >= $item->product_quantity)
                                <h4><span class="badge rounded-pil bg-success">Products in stock</span></h4>
                                
                            @else
                                <h4><span class="badge rounded-pil bg-danger">Out of Stock</span></h4>
                            @endif
                        </div>

                        <div class="col-md-2 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->product_id}}">
                            <button class = "btn btn-danger remove-wishlist-item"> <i class= "fa fa-trash"></i> Remove</button>
                        </div>
                            
                            
                    </div>
                    <hr>
                        
                    @endforeach
                    <a href="http://localhost/10tech/TenTechWebsite/public/shop" class="start-shopping-btn">START SHOPPING</a>
                @endif

            @else

            <div>
                <p>Your wishlist is currently empty</p>
                <a href="http://localhost/10tech/TenTechWebsite/public/shop" class="start-shopping-btn">START SHOPPING</a>
                <p class="signin-prompt">
                    <div class="alert alert-info mt-5" role="alert">
                        Please<a href="{{ route('login') }}"> Login </a>  to save items to your account and access them from everywhere.
                    </div>
                </p>
            </div>
            @endif
        </div>
    </div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  -->
<script src="/10tech/TenTechWebsite/resources/js/wishlist.js"></script>


</body>

</html>