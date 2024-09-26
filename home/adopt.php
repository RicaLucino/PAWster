<?php
session_start();

// Database connection
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'Paws'; // Your database name

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have user sessions
$user_id = $_SESSION['user_id'];

// Get the pet_id from the URL
$pet_id = $_GET['pet_id'];

// Insert the adoption record into the database
$query = "INSERT INTO adoptions (user_id, pet_id) VALUES ('$user_id', '$pet_id')";

if ($conn->query($query) === TRUE) {
    echo "You have successfully adopted the pet!";
    header('Location: user_dashboard.php'); // Redirect to user dashboard or confirmation page
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
