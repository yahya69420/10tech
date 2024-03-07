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

</body>

</html>