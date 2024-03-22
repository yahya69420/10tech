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
          margin-left: 200px;
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
            flex-basis: 20%;
          }
          .col-4 {
            flex-basis: 15%;
          }
        
          .col-5{
            flex-basis: 15%;
          }

          .col-6{
            flex-basis: 15%;
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

.viewbutton{
  background-color: #0f8db8; 
  border: none;
  color: black;
  padding: 15px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 10px;
}

.viewbutton:hover {
  background-color: #0a5e7a; /* Darker red color on hover */
  cursor: pointer;
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
        <a href="#" target="_blank">
          <span class="material-icons-outlined">Products</span> /Inventory
        </a>
      </li>

    </ul>
  </aside>
<body>
    
<div class="container">
  <h2>Users</h2>
  <button class="addbutton" id="addButton">Add User</button>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">User Id</div>
      <div class="col col-2">Email</div>
      <div class="col col-3">Last Updated</div>
      <div class="col col-4"></div> 
      <div class="col col-5"></div>
    </li>
    @foreach($data as $item)
    <li class="table-row">
      <div class="col col-1" data-label="UserId">{{ $item->id}}</div>
      <div class="col col-2" data-label="Email">{{ $item->email }}</div>
      <div class="col col-3" data-label="Date Created">{{ $item->updated_at }}</div>
      <div class="col col-4" data-label="Actions">
    <button class="viewbutton" onclick="document.getElementById('viewModal{{$item->id}}').style.display='block'">View More</button>
</div>
      <div class="col col-5" data-label="Actions">
    <form action="{{ route('admin.removeuser', ['id' => $item->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="removebutton" type="submit">Remove</button>
    </form>
    </div>
    <div class = "col col-6" data-label="Actions">
        <button class="editbutton">Edit</button>
</div>
    </li>
    @endforeach
  </ul>
</div>

<hr>

<div class="container">
  <h2>Customer Messages</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Msg Id</div>
      <div class="col col-2">Name</div>
      <div class="col col-3">Message</div>
      <div class="col col-4">Date Submitted</div> 
    </li>
    @foreach($datamess as $item)
    <li class="table-row">
      <div class="col col-1" data-label="UserId">{{ $item->id}}</div>
      <div class="col col-2" data-label="Name">{{ $item -> name}}</div>
      <div class="col col-3" data-label="Subject">{{ $item->subject }}</div>
      <div class="col col-4" data-label="Date Created">{{ $item->created_at }}</div>
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
    <form action="{{ route('admin.adduser') }}" method="POST" onsubmit="return validatePassword()">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button class="addbutton" type="submit">Add User</button>
    </form>
  </div>
</div>

<div id="viewModal{{$item->id}}" class="modal viewModal">
    <div class="container">
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Full Name</div>
                <div class="col col-2">Address Line 1</div>
                <div class="col col-3">City</div>
                <div class="col col-4">Post Code</div> 
            </li>
            <li class="table-row">
                <div class="col col-1" data-label="Full Name">{{ $userAddresses[$item->id]->full_name }}</div>
                <div class="col col-2" data-label="Address Line 1">{{ $userAddresses[$item->id]->address_line_1 }}</div>
                <div class="col col-3" data-label="City">{{ $userAddresses[$item->id]->city }}</div>
                <div class="col col-4" data-label="Post Code">{{ $userAddresses[$item->id]->post_code }}</div>
            </li>
        </ul>
    </div>
    <span class="close viewClose">&times;</span>
</div>



<div id="editModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="editForm" action="{{ route('admin.edituseraddress', ['id' => $item->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="edit_full_name">Full Name:</label>
        <input type="text" id="edit_full_name" name="edit_full_name" required>
        <label for="edit_address_line_1">Address Line 1:</label>
        <input type="text" id="edit_address_line_1" name="edit_address_line_1" required>
        <label for="edit_city">City:</label>
        <input type="text" id="edit_city" name="edit_city" required>
        <label for="edit_post_code">Post Code:</label>
        <input type="text" id="edit_post_code" name="edit_post_code" required>
        <button class="editbutton" type="submit">Save</button> 

    </form>
  </div>
</div>

<script>
  // Function to validate password length
  function validatePassword() {
    var password = document.getElementById("password").value;
    if (password.length < 8) {
      alert("Password must be at least 8 characters long");
      return false; // Prevent form submission
    }
    return true; // Allow form submission
  }

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

  // Get all viewModals
var viewModals = document.getElementsByClassName("viewModal");

// Loop through each viewModal and add event listener
for (var i = 0; i < viewModals.length; i++) {
  var viewModal = viewModals[i];
  // Get the close button for each view modal
  var viewCloseButton = viewModal.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the viewModal
  viewCloseButton.onclick = function() {
    viewModal.style.display = "none";
  };
}

// When the user clicks anywhere outside of the viewModal, close it
window.onclick = function(event) {
  for (var i = 0; i < viewModals.length; i++) {
    var viewModal = viewModals[i];
    if (event.target == viewModal) {
      viewModal.style.display = "none";
    }
  }
};

  // Get the edit modal for UserAddress
  var editModal = document.getElementById("editModal");

  // Get the edit button for UserAddress
  var editButtons = document.querySelectorAll(".editbutton");

  // Loop through each edit button and add event listener
  editButtons.forEach(function(button) {
    button.onclick = function() {
      // Get the user ID from the corresponding table row
      var userId = this.parentNode.parentNode.querySelector(".col-1").textContent.trim();
      

      // Display the edit modal
      editModal.style.display = "block";
    };
  });

  // Get the close button for the edit modal
  var editClose = editModal.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the edit modal
  editClose.onclick = function() {
    editModal.style.display = "none";
  };

  // When the user clicks anywhere outside of the edit modal, close it
  window.onclick = function(event) {
    if (event.target == editModal) {
      editModal.style.display = "none";
    }
  };
</script>



</body>
</html>
