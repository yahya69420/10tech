<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>View all orders</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('admin/dashboard') }}">TenTech: Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse show" id="navbarDark">
                <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/adminproducts') }}">Product View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/admincust') }}">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-primary text-white rounded-pill" href="{{ url('admin/orders') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Go to customer shop</a>
                    </li>
                </ul>
                <a href="{{ url('logout') }}">
                    <!-- credit (even though it is not required) https://uiverse.io/kennyotsu-monochromia/spicy-quail-62 -->
                    <button class="Btn">
                        <div class="sign"><svg viewBox="0 0 512 512">
                                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                            </svg></div>
                        <div class="text">Logout</div>
                    </button>
                </a>
                <style>
                    .Btn {
                        --black: #000000;
                        --ch-black: #141414;
                        --eer-black: #1b1b1b;
                        --night-rider: #2e2e2e;
                        --white: #ffffff;
                        --af-white: #f3f3f3;
                        --ch-white: #e1e1e1;
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                        width: 45px;
                        height: 45px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        position: relative;
                        overflow: hidden;
                        transition-duration: .3s;
                        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
                        background-color: var(--af-white);
                    }

                    /* plus sign */
                    .sign {
                        width: 100%;
                        transition-duration: .3s;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .sign svg {
                        width: 17px;
                    }

                    .sign svg path {
                        fill: var(--night-rider);
                    }

                    /* text */
                    .text {
                        position: absolute;
                        right: 0%;
                        width: 0%;
                        opacity: 0;
                        color: var(--night-rider);
                        font-size: 1.2em;
                        font-weight: 600;
                        transition-duration: .3s;
                    }

                    /* hover effect on button width */
                    .Btn:hover {
                        width: 125px;
                        border-radius: 5px;
                        transition-duration: .3s;
                    }

                    .Btn:hover .sign {
                        width: 30%;
                        transition-duration: .3s;
                        padding-left: 20px;
                    }

                    /* hover effect button's text */
                    .Btn:hover .text {
                        opacity: 1;
                        width: 70%;
                        transition-duration: .3s;
                        padding-right: 10px;
                    }

                    /* button click effect*/
                    .Btn:active {
                        transform: translate(2px, 2px);
                    }
                </style>
            </div>
        </div>
    </nav>
    <div class="container m-3">
        <h1>
            Orders
        </h1>
        <hr>
        <!-- the admin lte boxes -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ count($allOrders) }}</h3>
                <p>Total Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
        <div class="container m-3">
            <div class="d-flex justify-content-center p-2">
                <button class="btn btn-warning mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#pending" aria-expanded="false" aria-controls="pending">
                    View Pending Orders
                </button>
                <button class="btn btn-info mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#processing" aria-expanded="false" aria-controls="processing">
                    View Processing Orders
                </button>
                <button class="btn btn-success mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#completed" aria-expanded="false" aria-controls="completed">
                    View Completed Orders
                </button>
                <button class="btn btn-danger mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#cancelled" aria-expanded="false" aria-controls="cancelled">
                    View Cancelled Orders
                </button>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"> <i class="fas fa-hourglass-half"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Orders</span>
                        <span class="info-box-number">{{ count($pendingOrders) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"> <i class="fas fa-cog"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Processing Orders</span>
                        <span class="info-box-number">{{ count($processingOrders) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"> <i class="fas fa-check-circle"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Completed Orders</span>
                        <span class="info-box-number">{{ count($completedOrders) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"> <i class="fas fa-times-circle"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cancelled Orders</span>
                        <span class="info-box-number">{{ count($cancelledOrders) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="collapse" id="pending">
            <h1 class="text-center">Pending Orders</h1>
            <div class="card card-body">
                <!-- the pending products table -->
                <div class="container-fluid">
                    <caption>Pending Orders</caption>
                    <table class="table caption-top table-bordered mb-4">
                        <thead>
                            <tr class="table-warning">
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Total before discount</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total after discount</th>
                                <th scope="col">Discount ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $order)
                            @if($order->status == 'pending')
                            <!-- is the first titems of the order? then display the rowspan with the row number for that orderItems count in that order -->
                            @php $firstItem = true; @endphp
                            @foreach($order->orderItems as $orderItem)
                            <tr class="table-warning">
                                @if($firstItem)
                                <td rowspan="{{ count($order->orderItems) }}"><strong>{{ $order->tracking_number }}</strong></td>
                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->user_id }}</td>
                                @php $firstItem = false; @endphp
                                @endif
                                <td>{{ $orderItem->product_id }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                <td><span class="badge bg-warning" style="font-size: 15px; color:black;">
                                        <i class="fas fa-hourglass-half"></i> Pending
                                    </span>
                                </td>
                                <td class="text-dark">£{{ number_format($order->total_before_discount, 2) }}</td>
                                <td class="text-success"><strong>£{{ number_format($order->discount_amount, 2) }}</strong></td>
                                <td class="text-dark"><strong>£{{ number_format($order->total_after_discount, 2) }}</strong></td>
                                @if($order->discount_id == null)
                                <td>No discount</td>
                                @else
                                <td>{{ $order->discount_id }}</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">Process Order</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Process order: {{ $order->tracking_number }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('admin/edit-order') }}">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <div class="form-floating">
                                                    <select class="form-select" id="orderStatus" name="orderStatus" aria-label="Select order status">
                                                        @if($order->status == 'pending')
                                                        <option selected disabled>Pending</option>
                                                        @endif
                                                        <option value="processing" class="text-info bg-info">Processing</option>
                                                        <option value="completed" class="text-success bg-success">Completed</option>
                                                        <option value="cancelled" class="text-danger bg-danger">Cancelled</option>
                                                    </select>
                                                    <label for="orderStatus">Order status</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Process order</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="collapse" id="processing">
            <h1 class="text-center">Processing Orders</h1>
            <div class="card card-body">
                <!-- the processing products table -->
                <div class="container-fluid">
                    <caption>Processing Orders</caption>
                    <table class="table caption-top table-bordered mb-4">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Total before discount</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total after discount</th>
                                <th scope="col">Discount ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $order)
                            @if($order->status == 'processing')
                            <!-- is the first titems of the order? then display the rowspan with the row number for that orderItems count in that order -->
                            @php $firstItem = true; @endphp
                            @foreach($order->orderItems as $orderItem)
                            <tr class="table-info">
                                @if($firstItem)
                                <td rowspan="{{ count($order->orderItems) }}"><strong>{{ $order->tracking_number }}</strong></td>
                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->user_id }}</td>
                                @php $firstItem = false; @endphp
                                @endif
                                <td>{{ $orderItem->product_id }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                <td><span class="badge bg-info" style="font-size: 15px; color:black !important;">
                                        <i class="fas fa-cog"></i> Processing
                                    </span>
                                </td>
                                <td class="text-dark">£{{ number_format($order->total_before_discount, 2) }}</td>
                                <td class="text-success"><strong>£{{ number_format($order->discount_amount, 2) }}</strong></td>
                                <td class="text-dark"><strong>£{{ number_format($order->total_after_discount, 2) }}</strong></td>
                                @if($order->discount_id == null)
                                <td>No discount</td>
                                @else
                                <td>{{ $order->discount_id }}</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">Process Order</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Process order: {{ $order->tracking_number }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('admin/edit-order') }}">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <div class="form-floating">
                                                    <select class="form-select" id="orderStatus" name="orderStatus" aria-label="Select order status">
                                                        @if($order->status == 'processing')
                                                        <option selected disabled>Processing</option>
                                                        @endif
                                                        <option value="pending" class="text-warning bg-warning">Pending</option>
                                                        <option value="completed" class="text-info bg-info">Completed</option>
                                                        <option value="cancelled" class="text-danger bg-danger">Cancelled</option>
                                                    </select>
                                                    <label for="orderStatus">Order status</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Process order</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="collapse" id="completed">
            <h1 class="text-center">Completed Orders</h1>
            <div class="card card-body">
                <!-- the completed products table -->
                <div class="container-fluid">
                    <caption>Completed orders</caption>
                    <table class="table caption-top table-bordered mb-4">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Total before discount</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total after discount</th>
                                <th scope="col">Discount ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrders as $order)
                            @if($order->status == 'completed')
                            <!-- is the first titems of the order? then display the rowspan with the row number for that orderItems count in that order -->
                            @php $firstItem = true; @endphp
                            @foreach($order->orderItems as $orderItem)
                            <tr class="table-success">
                                @if($firstItem)
                                <td rowspan="{{ count($order->orderItems) }}"><strong>{{ $order->tracking_number }}</strong></td>
                                <td rowspan="{{ count($order->orderItems) }}">{{ $order->user_id }}</td>
                                @php $firstItem = false; @endphp
                                @endif
                                <td>{{ $orderItem->product_id }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                <td><span class="badge bg-success" style="font-size: 15px; color:black !important;">
                                        <i class="fas fa-check-circle"></i> Completed
                                    </span>
                                </td>
                                <td class="text-dark">£{{ number_format($order->total_before_discount, 2) }}</td>
                                <td class="text-success"><strong>£{{ number_format($order->discount_amount, 2) }}</strong></td>
                                <td class="text-dark"><strong>£{{ number_format($order->total_after_discount, 2) }}</strong></td>
                                @if($order->discount_id == null)
                                <td>No discount</td>
                                @else
                                <td>{{ $order->discount_id }}</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">Process Order</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Process order: {{ $order->tracking_number }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('admin/edit-order') }}">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <div class="form-floating">
                                                    <select class="form-select" id="orderStatus" name="orderStatus" aria-label="Select order status">
                                                        @if($order->status == 'completed')
                                                        <option selected disabled>Completed</option>
                                                        @endif
                                                        <option value="pending" class="text-warning bg-warning">Pending</option>
                                                        <option value="processing" class="text-info bg-info">Processing</option>
                                                        <option value="cancelled" class="text-danger bg-danger">Cancelled</option>
                                                    </select>
                                                    <label for="orderStatus">Order status</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Process order</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="collapse" id="cancelled">
            <h1 class="text-center">Cancelled Orders</h1>
            <!-- the cancelled products table -->
            <div class="container-fluid">
                <caption>Cancelled orders</caption>
                <table class="table caption-top table-bordered mb-4">
                    <thead>
                        <tr class="table-danger">
                            <th scope="col">Tracking Number</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Cancelled Date</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Total before discount</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total after discount</th>
                            <th scope="col">Discount ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allOrders as $order)
                        @if($order->status == 'cancelled')
                        <!-- is the first titems of the order? then display the rowspan with the row number for that orderItems count in that order -->
                        @php $firstItem = true; @endphp
                        @foreach($order->orderItems as $orderItem)
                        <tr class="table-danger">
                            @if($firstItem)
                            <td rowspan="{{ count($order->orderItems) }}"><strong>{{ $order->tracking_number }}</strong></td>
                            <td rowspan="{{ count($order->orderItems) }}">{{ $order->user_id }}</td>
                            @php $firstItem = false; @endphp
                            @endif
                            <td>{{ $orderItem->product_id }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $order->updated_at->format('d/m/Y H:i:s') }}</td>
                            <td><span class="badge bg-danger" style="font-size: 15px; color:black !important;">
                                    <i class="fas fa-times-circle"></i> Cancelled
                                </span>
                            </td>
                            <td class="text-dark">£{{ number_format($order->total_before_discount, 2) }}</td>
                            <td class="text-success"><strong>£{{ number_format($order->discount_amount, 2) }}</strong></td>
                            <td class="text-dark"><strong>£{{ number_format($order->total_after_discount, 2) }}</strong></td>
                            @if($order->discount_id == null)
                            <td>No discount</td>
                            @else
                            <td>{{ $order->discount_id }}</td>
                            @endif
                            <td>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">Process Order</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Process order: {{ $order->tracking_number }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/edit-order') }}">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <div class="form-floating">
                                                <select class="form-select" id="orderStatus" name="orderStatus" aria-label="Select order status">
                                                    @if($order->status == 'cancelled')
                                                    <option selected disabled>Cancelled</option>
                                                    @endif
                                                    <option value="pending" class="text-warning bg-warning">Pending</option>
                                                    <option value="processing" class="text-info bg-info">Processing</option>
                                                    <option value="completed" class="text-success bg-success">Completed</option>
                                                </select>
                                                <label for="orderStatus">Order status</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Process order</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if (session('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('error') }}",
        });
    </script>
    @endif
    @if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Great!",
            text: "{{ session('success') }}",
        });
    </script>
    @endif
</body>

</html>