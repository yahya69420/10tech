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

    <style> 
        .solid-heading {
            font-family: verdana; /* Change this to your desired solid font */
            font-weight: bold; /* Ensures the font appears solid */
            text-align: center;
        }
        
    </style>
</head>

<body>

    @include ('header ')

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if($wishlist->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Your wishlist is empty.
                    </div>
                    <a href="http://localhost/10tech/TenTechWebsite/public/shop"class="btn btn-primary btn-lg btn-block mt-5">Go to Shop</a>
                @else
                    <h3 class="solid-heading"> My WishList</h3>
                    @foreach ($wishlist as $item)
                    <hr>
                        <div class="row text-center d-flex align-items-center justify-content-center">
                            
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset($item->products->image) }}" height="100px" width="100px" alt="Image here">
                            </div>

                            <div class="col-md-2 my-auto">
                                <h4>{{ $item->products->name }} </h4>
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
                @endif
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="/10tech/TenTechWebsite/resources/js/wishlist.js"></script>


</body>

</html>