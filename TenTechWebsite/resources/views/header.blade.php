<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10tech</title>
    <style>
        
        body {
    margin: 0;
    font-family: 'Arial', sans-serif; /* Add a default font-family */
}

.header {
    display: flex;
    justify-content: space-between; /* Adjusted justify-content */
    align-items: center;
    padding: 20px;
    background-color: gray;
}

.search {
    display: flex;
    align-items: baseline;
    position: absolute;
    left: 150px;
    top: 26px;
    
}

.logo {
    margin-right: auto; /* Adjusted margin-right */
    margin-left: auto; /* Center the logo horizontally */
}

.navigation ul {
    display: flex;
    list-style: none;
    margin: 0; /* Remove default margin */
}

.navigation ul li {
    margin-left: 20px;
    margin-right: 20px;
}

/* Add styles for Profile and Basket */
.navigation ul li:last-child {
    margin-left: 5px; /* Add a margin to create a gap */
    margin-right: 15px; /* Push Basket to the right */
}


/* Optional: Style the input for search */
.search input {
    padding: 5px;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .logo {
        display: none; /* Hide the logo on smaller screens if needed */
    }
}



  a {
    color: #fff;
    text-decoration: none;
  }
  
  .p-menu1{
     align-self: baseline;
  }
  
  
  
  
  /* Hamburger */
  .hamburger1 {
    height: 35px;
    
    display: -ms-grid;
    display: grid;
    grid-template-rows: repeat(3, 1fr);
    justify-items: center;
    z-index: 120;
  }
  
  .hamburger1 div {
    background-color: rgb(61, 61, 61);
    position: relative;
    width: 40px;
    height: 5px;
    margin-top: 7px;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
  }
  
  #toggle1 {
    display: none;
  }
  
  #toggle1:checked + .hamburger1 .top {
    -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
    margin-top: 22.5px;
  }
  
  #toggle1:checked + .hamburger1 .meat {
    -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
    margin-top: -5px;
  }
  
  #toggle1:checked + .hamburger1 .bottom {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
  #toggle1:checked ~ .menu1 {
    height: 300px;
  }
  
  
  /* Menu */
  .menu1 {
    width: 100%;
    background-color: gray;
    margin: 0;
    display: -ms-grid;
    display: grid;
    grid-template-rows: 1fr repeat(4, 0.5fr);
    grid-row-gap: 25px;
    padding: 0;
    list-style: none;
    clear: both;
    width: auto;
    text-align: center;
    height: 0px;
    overflow: hidden;
    transition: height .4s ease;
    z-index: 120;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }
  
  .menu1 a:first-child {
    margin-top: 40px;
  }
  
  .menu1 a:last-child {
    margin-bottom: 40px;
  }
  
  .link1 {
    width: 100%;
    margin: 0;
    padding: 10px 0;
    font: 700 20px 'Oswald', sans-serif;
  }
  
  .link1:hover {
    background-color: #fff;
    color: rgb(61, 61, 61);
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }

      /* Style The Dropdown Button */
      .dropbtn {
    background-color: gray;
    justify-content: right;
    align-self: right;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
    position: relative;
    display: inline-block;
    margin-right: 20px;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: rgb(61, 61, 61);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {background-color: #f1f1f1}

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color: rgb(61, 61, 61);
  }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="TenTechWebsite\resources\css\headerstyle.css">

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
            <a class="link1" href="">Laptops</a>
            <a class="link1" href="">Smartphones</a>
            <a class="link1" href="">Tablets</a>
            <a class="link1" href="">Consoles</a>
            
          </nav>
        </nav>
        
      </section>
    <div class = "search">
        <input type="search">   
    </div>
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <nav class="navigation">
        <ul>
            <li class = "dropdown"><button class="dropbtn">Profile</button>
              <div class="dropdown-content">
                <a href="login">Login</a>
                <a href="register">Register</a>
              </div></li>
              <li class = "dropdown"><button class="dropbtn">Basket</button>
              <div class="dropdown-content">
                <a href="basket">Basket</a>
                <a href="checkout">Checkout</a>
              </div></li>
        </ul>
    </nav>
</header>

</body>
</html>
