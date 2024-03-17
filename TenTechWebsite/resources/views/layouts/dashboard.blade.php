<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>


<title>Admin Dashboard</title>
<style>
  #bar-chart {
  border: 2px solid #ffffff; /* White border */
  border-radius: 10px; /* Rounded corners */
  overflow: hidden; /* Ensures no overflow outside the border */
}
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
#sidebar {
  position: fixed; /* Changed from grid-area to fixed */
  top: 0; /* Align to the top */
  left: 0; /* Align to the left */
  width: 200px; /* Width of the sidebar */
  height: 100%;
  background-color: #21232d;
  color: #9799ab;
  overflow-y: auto;
  transition: all 0.5s;
  z-index: 1000; 
}


.sidebar-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 20px 20px 20px;
  margin-bottom: 30px;
}

.sidebar-title > span {
  display: none;
}

.sidebar-brand {
  margin-top: 15px;
  font-size: 20px;
  font-weight: 700;
}

.sidebar-list {
  padding: 0;
  margin-top: 15px;
  list-style-type: none;
}

.sidebar-list-item {
  padding: 20px 20px 20px 20px;
}

.sidebar-list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.sidebar-list-item > a {
  text-decoration: none;
  color: #9799ab;
}

.sidebar-responsive {
  display: inline !important;
  position: absolute;
  z-index: 12 !important;
}



.header {
  grid-area: header;
  height: 70px;
  background-color: #21232d;;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px 0 30px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}




</style>

</head>
<body>
  <header class="header">

  </header>
  <!-- Sidebar -->
  <aside id="sidebar">
    <div class="sidebar-title">
      <div class="sidebar-brand">
        <span class="material-icons-outlined">10Tech</span>
      </div>
    </div>

    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="#" target="_blank">
          <span class="material-icons-outlined">Admin</span> 
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="admincust" target="_blank">
          <span class="material-icons-outlined">Customer</span> 
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="{{ url('admin/adminproducts') }}" target="_blank">
          <span class="material-icons-outlined">Products</span> /Inventory
        </a>
      </li>

    </ul>
  </aside>

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
    </div>
    <div class="card" style="background: #2ecc71;">
      <a href="link-to-customers">
        <h3>inventory</h3>
        <p>1500</p>
      </a>
    </div>
    <div class="card" style="background: #e74c3c;">
      <a href="link-to-alerts">
        <h3>ALERTS</h3>
        <p>56</p>
      </a>
    </div>
    
  </div>
    <div class="card-body">
      <div id="bar-chart" style="height: 300px;"></div>
    </div>
    <script>
      $(function() {
        var bar_data = {
          data: [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
          bars: { show: true }
        };
        $.plot('#bar-chart', [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor: '#f3f3f3'
          },
          series: {
             bars: {
              show: true, barWidth: 0.5, align: 'center',
            },
          },
          colors: ['#3c8dbc'],
          xaxis: {
            ticks: [[1,'Jan'], [2,'Feb'], [3,'Mar'], [4,'Apr'], [5,'May'], [6,'Jun']]
          }
        });
      });
    </script>
    </body>
    </html>
    