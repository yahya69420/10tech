<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>10tech</title>
  <link rel="stylesheet" href="{{ asset('/css/headerstyle.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

  <header class="header">
    <section class="p-menu1">
      <nav id="navbar" class="navigation" role="navigation">
        <input id="toggle1" type="checkbox" />
        <label class="hamburger1" for="toggle1">
          <div class="top"></div>
          <div class="meat"></div>
          <div class="bottom"></div>
        </label>

        <nav class="menu1">
            <a class="link1" href="Laptop">Laptops</a>
            <a class="link1" href="Mobile">Smartphones</a>
            <a class="link1" href="Tablet">Tablets</a>
            <a class="link1" href="Console">Console</a>
            <a class="link1" href = "about">About Us</a>


        </nav>
      </nav>

    </section>
    <div class="search">
      <input type="search" placeholder="Search...">
    </div>
    <div class="logo">
      <h1>TenTech</h1>
    </div>
    <nav class="navigation">
      <ul>
        <li class="dropdown"><button class="dropbtn"><img src="account.png" class="account"></button>
          <div class="dropdown-content">
             <!-- if user authenticated, show POST logout button with CSRF token for security -->
            @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
            </form>
            @else
            <!-- if user is not authenticated, show login and register links -->
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endif
          </div>
        </li>
        <li class="dropdown"><button class="dropbtn"><img src="shopping-basket.png" class="account"></button>
          <div class="dropdown-content">
            <a href="{{ route('basket') }}">Basket</a>
            <a href="http://localhost/10tech/TenTechWebsite/public/checkout">Checkout</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>
