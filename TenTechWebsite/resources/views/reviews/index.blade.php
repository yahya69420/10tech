<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Write a Review</title>

</head>

<body>
    @include('header')

    <section class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase)
                        <h5> You are writing a review for {{ $product->name}} </h5>

                        <form action="{{ url('/add-review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                            <button type="submit" class="btn btn-primary mt-3"> Submit Review</button>
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <h5> You are not eligible to review this product </h5>
                            <p>
                                Only verified purchasers can submit reviews to ensure authenticity. Thank you for understanding
                            </p>
                            <a href="{{ route('productdetail', ['id' => $product->id]) }}" class="btn btn-primary mt-5">Go to Product page</a>

                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
        <section>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>