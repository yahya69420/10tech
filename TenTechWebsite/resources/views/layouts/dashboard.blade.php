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
  <title>TenTech: Dashboard</title>
</head>

<body class="bg-dark text-white">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('admin/dashboard') }}">TenTech: Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse show" id="navbarDark">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a class="nav-link active bg-primary text-white rounded-pill" aria-current="page" href="{{ url('admin/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/adminproducts') }}">Product View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/admincust') }}">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/orders') }}">Orders</a>
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
    <!-- admin lte -->

    <div class="row">
      <div class="col-md-12 col-sm-6 col-12">
        <div class="small-box bg-white">
          <div class="inner">
            <h1>Go to the shop</h1>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-right"></i>
          </div>
          <a href="{{ url('/') }}" class="small-box-footer">
            Go to shop view <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-gradient-success">
          <div class="inner">
            <h3>{{ count($customers) }}</h3>
            @if (count($customers) > 1)
            <p>Customers</p>
            @else
            <p>Customer</p>
            @endif
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="{{ url('admin/admincust') }}" class="small-box-footer">
            View Customers <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-gradient-info">
          <div class="inner">
            <h3>{{ count($admins) }}</h3>
            @if (count($admins) == 1)
            <p>Admin</p>
            @else
            <p>Admins</p>
            @endif
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ count($orders) }}</h3>
            <p>Total Orders</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="{{ url('admin/orders') }}" class="small-box-footer">
            View Orders <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ count($products) }}</h3>
            <p>Products</p>
          </div>
          <div class="icon">
            <i class="fas fa-box"></i>
          </div>
          <a href="{{ url('admin/adminproducts') }}" class="small-box-footer">
            View Products <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card direct-chat direct-chat-warning">
          <div class="card-header">
            <h3 class="card-title">Customer Messages</h3>
          </div>
          <div class="card-body">
            <div class="direct-chat-messages">
              <!-- Loop through each message -->
              @foreach ($messages as $message)
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left">{{ $message->name }}</span>
                  <span class="direct-chat-timestamp float-right"><i class="fas fa-clock"></i>
                    <strong>
                      {{ \Carbon\Carbon::parse($message->created_at)->isoFormat('dddd Do MMMM YYYY [at] HH:mm') }}
                    </strong>
                  </span>
                </div>
                <img class="direct-chat-img" src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/img/user1-128x128.jpg" alt="message user image">
                <div class="direct-chat-text">
                  {{ $message->subject }}
                </div>
              </div>
              <!-- /.direct-chat-msg -->
              @endforeach
            </div>
            <!-- /.direct-chat-messages -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->    
</body>
</html>