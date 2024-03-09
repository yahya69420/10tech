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
</body>
</html>