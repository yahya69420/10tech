<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
          font-family: 'lato', sans-serif;
          background: #0e161d;
        }
        .container {
          max-width: 1000px;
          margin-left: auto;
          margin-right: auto;
          padding-left: 10px;
          padding-right: 10px;
        }

        h2 {
          font-size: 26px;
          color: white;
          margin: 20px 0;
          text-align: center;
        }

        .responsive-table {
          li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
          }
          .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
          }
          .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
          }
          .col-1 {
            flex-basis: 10%;
          }
          .col-2 {
            flex-basis: 25%;
          }
          .col-3 {
            flex-basis: 25%;
          }
          .col-4 {
            flex-basis: 20%;
          }
        
          .col-5{
            flex-basis: 20%:
          }

          @media all and (max-width: 767px) {
            .table-header {
              display: none;
            }
            .table-row{

            }
            li {
              display: block;
            }
            .col {

              flex-basis: 100%;

            }
            .col {
              display: flex;
              padding: 10px 0;
              &:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
              }
            }
          }
        }

        /* Modal */
        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0,0,0,0.4);
          padding-top: 60px;
        }

/* CSS */
.addbutton {
  margin-left: 40px;
  background-color: #95A5A6;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 10px; 
}

.addbutton:hover,
.addbutton:hover{
    background-color: #788485;
    cursor: pointer;
}

.editbutton {
    background-color: #2da96d;
    border: none;
  color: black;
  padding: 15px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 10px;
}

.editbutton:hover{
    cursor: pointer;
    background-color: #1f7e50;
}

.removebutton {
  background-color: #E74C3C; /* Red color for remove button */
  border: none;
  color: black;
  padding: 15px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 10px;
}

.removebutton:hover {
  background-color: #C0392B; /* Darker red color on hover */
  cursor: pointer;
}

/* Modal content */
.modal-content {
  background-color: #95A5A6;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Adjust the width as needed */
  text-align: center; /* Center the content */
  border-radius: 10px; /* Rounded corners */
}


/* Modal close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  top: 10px;
  right: 10px;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

    </style>
</head>
<body>
    
<div class="container">
  <h2>Users</h2>
  <button class="addbutton" id="addButton">Add User</button>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">User Id</div>
      <div class="col col-2">Email</div>
      <div class="col col-3">Date Created</div>
      <div class="col col-4"></div>
      <div class="col col-4"></div>
    </li>
    @foreach($data as $item)
    <li class="table-row">
      <div class="col col-1" data-label="UserId">{{ $item->id}}</div>
      <div class="col col-2" data-label="Email">{{ $item->email }}</div>
      <div class="col col-3" data-label="Date Created">{{ $item->created_at }}</div>
      <div class="col col-4" data-label="Actions">
    <form action="{{ route('admin.removeuser', ['id' => $item->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="removebutton" type="submit">Remove</button>
    </form>
    </div>
    <div class = "col col-5" data-label="Actions">
        <button class="editbutton">Edit</button>
</div>
    </li>
    @endforeach
  </ul>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="{{ route('admin.adduser') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button class="addbutton" type="submit">Add User</button>
    </form>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("addButton");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>
