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
                            @if ($userOrders->count() == 0)
                            <p class="heading-4 font-weight-bold title fs-1">You have no orders yet</p>
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg mb-2">Let's change that!</a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            @else
                            @if ($userOrders->count() == 1)
                            <p class="heading-4 font-weight-bold title fs-1">Order History ({{ $userOrders->count() }} order)</p>
                            @else
                            <p class="heading-4 font-weight-bold title fs-1">Order History ({{ $userOrders->count() }} orders)</p>
                            @endif
                            @endif
                        </div>
                    </div>
                    <hr class="border-0 bg-dark bg-gradient" style="height: 10px;">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        @foreach($userOrders as $order)
                        @if($order->status == 'pending')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <form action="{{ route('order-details', ['id' => $order->tracking_number]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                                            <h6 class="heading-6 heading-6 fw-bold text-primary">Order ID: {{ $order->tracking_number }}</h6>
                                            <input type="hidden" name="id" value="{{ $order->tracking_number }}">
                                        </button>
                                    </form>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £{{ number_format($order->total_after_discount, 2) }}</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        @php
                                        $totalQuantity = 0;
                                        $orderInfoDisplayed = false;
                                        @endphp
                                        @foreach($order->orderItems as $item)
                                        @php
                                        $totalQuantity += $item->quantity;
                                        @endphp
                                        @endforeach
                                        @if (!$orderInfoDisplayed)
                                        <li>
                                            @if ($totalQuantity > 1)
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} items ordered</h6>
                                            @else
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} item ordered</h6>
                                            @endif
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: {{ \Carbon\Carbon::parse($order->order_date)->toDayDateTimeString() }}</h6>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PENDING</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach

                        @foreach($userOrders as $order)
                        @if($order->status == 'processing')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <form action="{{ route('order-details', ['id' => $order->tracking_number]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                                            <h6 class="heading-6 heading-6 fw-bold text-primary">Order ID: {{ $order->tracking_number }}</h6>
                                            <input type="hidden" name="id" value="{{ $order->tracking_number }}">
                                        </button>
                                    </form>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £{{ number_format($order->total_after_discount, 2) }}</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        @php
                                        $totalQuantity = 0;
                                        $orderInfoDisplayed = false;
                                        @endphp
                                        @foreach($order->orderItems as $item)
                                        @php
                                        $totalQuantity += $item->quantity;
                                        @endphp
                                        @endforeach
                                        @if (!$orderInfoDisplayed)
                                        <li>
                                            @if ($totalQuantity > 1)
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} items ordered</h6>
                                            @else
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} item ordered</h6>
                                            @endif
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: {{ \Carbon\Carbon::parse($order->order_date)->toDayDateTimeString() }}</h6>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PROCESSING</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach

                        @foreach($userOrders as $order)
                        @if($order->status == 'completed')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <form action="{{ route('order-details', ['id' => $order->tracking_number]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                                            <h6 class="heading-6 heading-6 fw-bold text-primary">Order ID: {{ $order->tracking_number }}</h6>
                                            <input type="hidden" name="id" value="{{ $order->tracking_number }}">
                                        </button>
                                    </form>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £{{ number_format($order->total_after_discount, 2) }}</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        @php
                                        $totalQuantity = 0;
                                        $orderInfoDisplayed = false;
                                        @endphp
                                        @foreach($order->orderItems as $item)
                                        @php
                                        $totalQuantity += $item->quantity;
                                        @endphp
                                        @endforeach
                                        @if (!$orderInfoDisplayed)
                                        <li>
                                            @if ($totalQuantity > 1)
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} items ordered</h6>
                                            @else
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} item ordered</h6>
                                            @endif
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: {{ \Carbon\Carbon::parse($order->order_date)->toDayDateTimeString() }}</h6>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; color:black; font-size:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">DELIVERED</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach

                        @foreach($userOrders as $order)
                        @if($order->status == 'cancelled')
                        <div class="single-order border rounded p-3 m-3 shadow">
                            <div class="order-header">
                                <div class="order-id d-flex justify-content-between">
                                    <form action="{{ route('order-details', ['id' => $order->tracking_number]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-dark" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                                            <h6 class="heading-6 heading-6 fw-bold text-primary">Order ID: {{ $order->tracking_number }}</h6>
                                            <input type="hidden" name="id" value="{{ $order->tracking_number }}">
                                        </button>
                                    </form>
                                    <h5 class="heading-5 fw-bold text-dark">Total: £{{ number_format($order->total_after_discount, 2) }}</h5>
                                </div>

                                <div class="order-info">
                                    <ul class="list-unstyled">
                                        @php
                                        $totalQuantity = 0;
                                        $orderInfoDisplayed = false;
                                        @endphp
                                        @foreach($order->orderItems as $item)
                                        @php
                                        $totalQuantity += $item->quantity;
                                        @endphp
                                        @endforeach
                                        @if (!$orderInfoDisplayed)
                                        <li>
                                            @if ($totalQuantity > 1)
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} items ordered</h6>
                                            @else
                                            <h6 class="heading-6 font-weight-500">Quantity: {{ $totalQuantity }} item ordered</h6>
                                            @endif
                                        </li>
                                        <li>
                                            <h6 class="heading-6 font-weight-500">Order Date: {{ \Carbon\Carbon::parse($order->order_date)->toDayDateTimeString() }}</h6>
                                        </li>
                                        @endif
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