<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tentechwebsite_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have variables $firstName, $lastName, $email, and $message defined elsewhere in your code

// Prepare SQL statement
$sql = "INSERT INTO messages (first_name, last_name, email, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (
    !$stmt ||
    !isset($firstName) || !isset($lastName) || !isset($email) || !isset($message)
) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "Message saved successfully."; // Confirmation message
} else {
    echo "Error: " . $stmt->error; // Error message
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
