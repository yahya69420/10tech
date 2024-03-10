<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
          font-family: 'Arial', sans-serif;
          margin: 0;
          padding: 0;
          background: #0e161d;
        }
        .content {
    margin-left: 250px;
    padding: 20px;
  }
  .dashboard {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Ensure cards wrap when needed */
  }
  .card a {
    text-decoration: none;
    color: inherit;
    display: block;
  }
  .card {
    background: #fff;
    border-radius: 0px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
    flex-basis: 20%;
    margin: 10px;
    padding: 20px;
    box-sizing: border-box;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }
  .card h3 {
    margin: 0;
    color: #333;
  }
  .chart-container, .chart-container2 {
  padding: 20px;
  background: #1a2938;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  margin-top: 20px; 
  flex: 1; 
  max-width: calc(50% - 40px); 
  box-sizing: border-box; 
}

.charts-flex-container {
  display: flex;
  justify-content: space-around; 
  align-items: flex-start;
  flex-wrap: wrap; 
  margin: 20px; 
}









        </style>
</head>
<body>
  
    <div class="content">
        <div class="dashboard">
          
          <div class="card" style="background: #3498db;">
            <a href="admincust">
              <h3>Customer</h3>
              <p>249</p>
            </a>
          </div>
          <div class="card" style="background: #e67e22;">
            <a href="link-to-categories">
              <h3>order</h3>
              <p>25</p>
            </a>
          </div>    <div class="card" style="background: #2ecc71;">
            <a href="link-to-customers">
              <h3>inventory</h3>
              <p>1500</p>
            </a>
          </div> <div class="card" style="background: #e74c3c;">
            <a href="link-to-alerts">
              <h3>ALERTS</h3>
              <p>56</p>
            </a>
          </div>
        </div><div class="charts-flex-container">

            <div class="chart-container">
              <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
          <div class="chart-container2">
            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
          </div>
          </div>
          
          </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
  
const xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [55, 49, 44, 24, 15];
const barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>

</html>