<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 90%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("http://127.0.0.1:8000/pexels-orhan-pergel-18980943.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.hero-text {
  text-align: center;
  color: white;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}

.text {
  margin-top: 50px;
  margin-left: 50px;
  margin-right: 50px;
}

.list {
  margin-left: 50px;
}

.container {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
}

.lorem {
  max-width: 600px;
}

.image {
  max-width: 30%;
}

</style>
</head>
<body>
@include ('header')
<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">We are TenTech</h1>

  </div>
</div>
<h3 class="text">Our team:</h3>
<div class="container">

<ul class="list">
    <li>Awad Riaz</li>
    <li>Muhammad Rashid</li>
    <li>Syed Shah</li>
    <li>Ali Salad</li>
    <li>Ali Qadeer</li>
    <li>Tashdid Salam</li>
    <li>Shuaib Ur Rehman</li>
    <li>Rahul Vasantlal</li>
</ul>


  <p class="lorem">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.
  </p>

</div>

<footer>@include('layouts/footer')</footer>
</body>
</html>
