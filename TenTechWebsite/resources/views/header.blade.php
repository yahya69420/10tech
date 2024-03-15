<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>10tech</title>
  <link rel="stylesheet" href="{{ asset('/css/headerstyle.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>

  <header class="header">
    <section class="p-menu1">
      <nav id="navbar" class="navigation" role="navigation">
        <input id="toggle1" type="checkbox" />
        <label class="hamburger1" for="toggle1">
          <div class="top"></div>
          <div class="meat"></div>
          <div class="bottomm"></div>
        </label>

        <nav class="menu1">
          <a class="link1" href="{{ url('Laptop') }}">Laptops</a>
          <a class="link1" href="{{ url('Mobile') }}">Smartphones</a>
          <a class="link1" href="{{ url('Tablet') }}">Tablets</a>
          <a class="link1" href="{{ url('Console') }}">Console</a>
          <a class="link1" href="{{ url('about') }}">About Us</a>
          <a class="link1" href="{{ url('contact') }}">Contact Us</a>


        </nav>
      </nav>

    </section>
    <div class="search">
      <input type="search" placeholder="Search..." id="searchBar">
    </div>
    <div class="logo">
      <h1 class="home"><a href="{{ url('shop') }}">TenTech</a>
      </h1>
    </div>
    <nav class="navigation">
      <ul>
        <!-- if user is not authenticated, show login and register links -->
        @if (!Auth::check())
        <li class="dropdown"><button class="dropbtn"><img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png" class="account"></button>
          <div class="dropdown-content">
            <a href="{{ route('login') }}">Login</a>
            <hr>
            <a href="{{ url('register') }}">Register</a>
          </div>
        </li>
        @endif
        @if (Auth::check())
        @if (Auth::user()->profile_image == null)
        <li class="dropdown"><button class="dropbtn"><img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png" class="account"></button>
          <div class="dropdown-content">
            <a href="{{ route('settings') }}">User Profile</a>
            <hr>
            <a href="{{ url('logout') }}">Logout</a>
          </div>
        </li>
        @else
        <!-- erorr: was not shwoing pp so used asset() biuldeing a url from relative path of public/ {{ Auth::user()->profile_image }}  -->
        <li class="dropdown"><button class="dropbtn"><img src="{{ asset(Auth::user()->profile_image) }}" class="account" style="width:50px; height:50px; border-radius:50%;"></button>
          <div class="dropdown-content">
            <a href="{{ route('settings') }}">User Profile</a>
            <hr>
            <a href="{{ url('logout') }}">Logout</a>
          </div>
        </li>
        @endif
        @endif
        <div class="dropdown-content">
          <!-- if user authenticated, show POST logout button with CSRF token for security -->
          @if (Auth::check())
          <a href="{{ route('settings') }}">User Profile</a>
          <!-- added user settings route to modify settings profile for user -->
          <hr>
          <a href="{{ url('logout') }}">Logout</a>
          @else
          <!-- if user is not authenticated, show login and register links -->
          <li class="dropdown"><button class="dropbtn"><img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png" class="account"></button>
            <div class="dropdown-content">
              <a href="{{ route('login') }}">Login</a>
              <hr>
              <a href="{{ url('register') }}">Register</a>
            </div>
          </li>
          @endif
        </div>
        </li>
        <li class="dropdown"><button class="dropbtn"><img src="https://cdn.icon-icons.com/icons2/1795/PNG/512/shoppingbasket_114841.png" class="account"></button>
          <div class="dropdown-content">
            <a href="{{ route('basket') }}">Basket</a>
            <a href="http://localhost/10tech/TenTechWebsite/public/checkout">Checkout</a>
            <a href="http://localhost/10tech/TenTechWebsite/public/wishlist">Wishlist</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
</body>

</html>