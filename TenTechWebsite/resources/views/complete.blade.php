<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Complete!</title>
</head>
<style>
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 30%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: gray;
  color: black;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: rgb(61, 61, 61);
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>    
</head>
<body>
@include ('header ')

</body>
<div class="row">
  <div class="col-75">
    <div class="container" >

        <div class="row" >
          <div class="col-50" style = "background-color: gray"  >
            <h1>SUCCESS!</h1>
            <div class="row">

              <div class="col-50" >
                    <p>Your order has been confirmed!</p>
                    <br>
                    <p>Sit tight and wait. In order to track your order, here is your <b>tracking number:</b></p>
                    <hr>
                    <h3>0000-0000-0000</h3>
                    <br>
                    <p>We'll send you an email confirming all the details</p>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Delivery Address</h3>
            <hr>
            <h3>Billing Address</h3>
            <hr>
            <h3>Contact Details</h3>
            </div>
          </div>

        </div>
    </div>
  </div>

</html>