<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10tech</title>
    <style>
        
.header {
    display: flex;
    justify-content: left;
    align-items:baseline;
    padding: 20px;
    background-color: gray;
}

.search{
    justify-content: center;
    align-self:baseline;
    position: relative;
    top: 14px;
    margin-right: 275px;
}
.logo {
   
    justify-content: center;
    align-self:center;
    margin-right: 350px;
}
.navigation ul {
    display: flex;
    list-style: none;
}

.navigation ul li {
    margin-left: 20px;
    margin-right: 20px;
    position: relative;

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
            <a class="link1" href="">Our Models</a>
            <a class="link1" href="">Specialties</a>
            <a class="link1" href="">About</a>
            <a class="link1" href="">Blog</a>
            
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
            <li>Profile</li>
            <li>Basket</li>
            
        </ul>
    </nav>
</header>

</body>
</html>
