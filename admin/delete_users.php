<?php
// Database connection
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pawster';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user
    $query = "DELETE FROM users WHERE id='$userId'";
    if ($conn->query($query) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Close the connection
$conn->close();

// Redirect back to manage users
header('Location: manage_users.php');
exit();
?>
