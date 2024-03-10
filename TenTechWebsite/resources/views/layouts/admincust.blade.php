<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 

</head>
<body>

    
<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Date Created</th>   
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->email}}</td>
            <td>{{ $item->created_at}}</td>
            <!-- Display more columns as needed -->
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Add button -->
<button id="addButton">Add User</button>

<!-- Add user form (initially hidden) -->
<div id="addUserForm" style="display: none;">
    <form action="{{ route('admin.adduser') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Add User</button>
    </form>
</div>
   <script>
    // Get references to the button and form
    var addButton = document.getElementById('addButton');
    var addUserForm = document.getElementById('addUserForm');

    // Add event listener to the button
    addButton.addEventListener('click', function() {
        // Toggle the visibility of the form
        if (addUserForm.style.display === 'none') {
            addUserForm.style.display = 'block';
        } else {
            addUserForm.style.display = 'none';
        }
    });
</script>
</body>
</html>