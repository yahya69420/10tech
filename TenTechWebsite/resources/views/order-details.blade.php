<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $details->tracking_number }}</title>


    <style>
        .progress-bar {
            position: relative;
            overflow: visible;
        }

        .progress-bar .text {
            position: absolute;
            width: 100%;
            text-align: center;
            color: black;
        }

        .progress-bar .icon {
            position: absolute;
            top: 88%;
            transform: translateY(-50%);
            width: 100%;
            text-align: center;
            height: 30px;
            color: black;
            font-size: 20px;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="body-of-deets mb-5">
        <div class="container mt-5 p-4 shadow rounded">
            <div class="d-flex flex-row justify-content-between">
                <h3>Order ID: {{ $details->tracking_number }}</h3>
            </div>
            @if ($details->status == 'pending')
            <div class="progress" style="height:50px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <span class="text fs-3">PENDING</span>
                </div>
                @elseif ($details->status == 'processing')
                <div class="progress" style="height:50px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <span class="text fs-3">PROCESSING</span>
                    </div>

                    @elseif ($details->status == 'completed')
                    <div class="progress" style="height:50px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <span class="text fs-3">DELIVERED</span>
                        </div>
                        @else
                        <div class="progress" style="height:50px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <span class="text fs-3">CANCELLED</span>
                            </div>
                            @endif
                        </div>
                        <div class="row mt-2">
                            <!-- Left Table 505% of width -->
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table caption-top">
                                        <div class="mt-30">
                                            <div class="title bg-secondary p-3 rounded shadow mt-1 mb-1" style="background-image: radial-gradient( circle 674px at 18.3% 77%,  rgba(139,186,244,1) 3.4%, rgba(15,51,92,1) 56.6% );">
                                                <h4>Ordered Products</h4>
                                            </div>
                                            @foreach ($details->orderItems as $item)
                                            <tbody>
                                                <tr>
                                                    <td class="aProduct">
                                                        <div class="d-flex align-items-center">
                                                            <div class="thumbnail">
                                                                <img src="{{ asset($item->product->image) }}" alt="product" class="img-fluid" style="height:150px; width:150px;">
                                                            </div>
                                                            <div class="product-deets m-3">
                                                                <h6 class="product-title">
                                                                    <a href="{{ route('productdetail', ['id' => $item->product->id]) }}" class="text-primary">{{ $item->product->name }}</a>
                                                                </h6>
                                                                <ul class="list-unstyled d-flex">
                                                                    <li class="me-3">
                                                                        <span>Unit Price: £{{ $item->product->price }}</span>
                                                                    </li>
                                                                    <li class="me-3">
                                                                        @if ($item->quantity > 1)
                                                                        <span>Quantity: {{ $item->quantity }} units</span>
                                                                    </li>
                                                                    @else
                                                                    <span>Quantity: {{ $item->quantity }} unit</span>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="price-of-product">
                                                        <span style="font-weight: bold; font-size: 20px">Total Price: £{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                    </table>

                                </div>
                            </div>

                            <!-- Right Table 506% of width -->
                            <div class="col-md-4 overflow-hidden">
                                <div class="table-responsive">
                                    <table class="table table-borderless overflow-hidden">
                                        <tbody>
                                            <div class="mt-30">
                                                <div class="title bg-secondary p-3 rounded shadow mt-1 mb-1" style="background-image: radial-gradient( circle 674px at 18.3% 77%,  rgba(139,186,244,1) 3.4%, rgba(15,51,92,1) 56.6% );">
                                                    <h4>Order Details</h4>
                                                </div>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex order-id justify-content-lg-start">
                                                            <p class="me-3">Order ID: {{ $details->tracking_number }}</p>
                                                        </div>
                                                        <div class="d-flex order-date justify-content-lg-start">
                                                            <p class="me-3">Order Date: {{ \Carbon\Carbon::parse($details->order_date)->toDayDateTimeString() }}</p>
                                                        </div>
                                                        @if ($details->status == 'cancelled')
                                                        <strong>
                                                            <p class="me-3">Cancelled On: {{ \Carbon\Carbon::parse($details->updated_at)->toDayDateTimeString() }}</p>
                                                        </strong>
                                                        <div class="fas fa-window-close" style="font-size: 30px; color: red;"></div>
                                                        @elseif ($details->status == 'completed')
                                                        <strong>
                                                            <p class="me-3">Delivered On: {{ \Carbon\Carbon::parse($details->updated_at)->toDayDateTimeString() }}</p>
                                                        </strong>
                                                        @endif
                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <div class="title bg-secondary p-3 rounded shadow mt-1 mb-2" style="background-image: radial-gradient( circle 674px at 18.3% 77%,  rgba(139,186,244,1) 3.4%, rgba(15,51,92,1) 56.6% );">
                                                                    <h4>Personal Details</h4>
                                                                </div>
                                                                <p>Email: {{ $details->user->email }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-12">
                                                                <div class="title bg-secondary p-3 rounded shadow mt-1 mb-1" style="background-image: radial-gradient( circle 674px at 18.3% 77%,  rgba(139,186,244,1) 3.4%, rgba(15,51,92,1) 56.6% );">
                                                                    <h4>Delivery Details</h4>
                                                                </div>
                                                                <p>Address Line 1: {{ $details->userAddress->address_line_1 }}</p>
                                                                <p>Address Line 2: {{ $details->userAddress->address_line_2 }}</p>
                                                                <p>City: {{ $details->userAddress->city }}</p>
                                                                <p>Post Code: {{ $details->userAddress->post_code }}</p>
                                                                <p>Country: {{ $details->userAddress->country }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h4 style="font-weight: bold; font-size: 30px;">Total Price (+): £{{ number_format($details->total_before_discount, 2) }}</h4>
                            <h4 style="font-weight: bold; font-size: 30px; color:green;">Discounts (-): £{{ number_format($details->discount_amount, 2) }}</h4>
                            <hr>
                            <b>
                                <h4 style="font-weight: bold; font-size: 30px;">Grand Total: £{{ number_format($details->total_after_discount, 2) }}</h4>
                            </b>
                        </div>
                        <hr>
                        <div class="title bg-secondary p-3 rounded shadow mt-1 mb-1 card-subtitle text-muted" style="background-image: radial-gradient( circle 674px at 18.3% 77%,  rgba(139,186,244,1) 3.4%, rgba(15,51,92,1) 56.6% );">
                            <h4>Cancellations</h4>
                        </div>
                        <ol>
                            <li><strong>Cancellation Period:</strong> Orders can be cancelled within 24 hours of placement.</li>

                            <li><strong>Procedure:</strong> Log in, go to "Order History," and follow instructions for cancellation.</li>

                            <li><strong>Refund:</strong> Full refund for cancellations within 24 hours; after, refund terms may vary.</li>

                            <li><strong>Exceptions:</strong> Items that have been damaged may not be accepted during returns process.</li>

                            <li><strong>Communication:</strong> Email confirmation upon successful cancellation.</li>
                        </ol>
                        <div class="container m-3">
                        </div>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="button" autocomplete="off">Write a review!</button>
                        <button type="button" class="btn btn-outline-danger">Cancel your order</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/footer')
</body>

</html>