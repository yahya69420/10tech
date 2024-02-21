<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #848484;
        overflow-x: hidden;
        padding-top: 20px;
      }
      
      
      .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #ffffff;
        display: block;
        border: none;
        background: none;
        width:100%;
        text-align: left;
        cursor: pointer;
        outline: none;
      }
      
      
      .sidenav a:hover, .dropdown-btn:hover {
        color: #f1f1f1;
      }
      
      
      .main {
        margin-left: 200px; 
        font-size: 20px; 
        padding: 0px 10px;
      }
      
      .active {
        background-color: rgb(231, 231, 231);
        color: white;
      }
      
      .dropdown-container {
        display: none;
        background-color: #262626;
        padding-left: 8px;
      }
      
      .fa-caret-down {
        float: right;
        padding-right: 8px;
      }
      
          </style>
</head>
<body>
    <div class="sidenav">

        <button class="dropdown-btn">Admin Account
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">Log in</a>
          <a href="#">Sign Up</a>
          <a href="#">Change Password</a>
        </div>
        <button class="dropdown-btn">Order Processing
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#">view order</a>
            <a href="#">processing shipment</a>
          </div>
          <button class="dropdown-btn">Customers
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#">View Customers</a>
            <a href="#">add Customers</a>
            <a href="#">delete Customers</a>
            <a href="#">update Customers details</a>
            
          </div>
          <button class="dropdown-btn">Inventory
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 3</a>
            <a href="#">Link 3</a>
            <a href="#">Link 3</a>
            <a href="#">Link 3</a>
            <a href="#">Link 3</a>

          </div>
      
</body>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</html>