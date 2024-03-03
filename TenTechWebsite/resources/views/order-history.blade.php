<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Order History</title>
</head>

<body>
    @include('header')

    <div class="order-history-body">
        <section class="order-history-wrapper pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="history-title">
                            <p class="heading-4 font-weight-bold title fs-1">Order History</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        @foreach($orders as $order)
                        @if($order->status == 'pending')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <h6 class="heading-6 heading-6 fw-bold text-dark">Order ID: 123456</h6>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £1000</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Quantity: 1 Product</h6>
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: 12/12/2021</h6>
                                        </li>
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PENDING</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach ($orders as $order)
                        @if($order->status == 'processing')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <h6 class="heading-6 heading-6 fw-bold text-dark">Order ID: 123456</h6>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £1000</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Quantity: 1 Product</h6>
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: 12/12/2021</h6>
                                        </li>
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PROCESSING</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach ($orders as $order)
                        @if($order->status == 'completed')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <h6 class="heading-6 heading-6 fw-bold text-dark">Order ID: 123456</h6>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £1000</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Quantity: 1 Product</h6>
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: 12/12/2021</h6>
                                        </li>
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">DELIVERED</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach ($orders as $order)
                        @if($order->status == 'cancelled')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <h6 class="heading-6 heading-6 fw-bold text-dark">Order ID: 123456</h6>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £1000</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Quantity: 1 Product</h6>
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: 12/12/2021</h6>
                                        </li>
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">CANCELLED</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts/footer')

</body>

</html>