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
    $requestId = $_GET['id'];

    // Update the status to 'Approved'
    $query = "UPDATE adoption_requests SET status='Approved' WHERE id='$requestId'";
    if ($conn->query($query) === TRUE) {
        echo "Adoption request approved.";
    } else {
        echo "Error approving request: " . $conn->error;
    }
}

// Close connection
$conn->close();

// Redirect back to adoption requests page
header('Location: adoption_requests.php');
exit();
?>
