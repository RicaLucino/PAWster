<?php
session_start();

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

// Fetch all adoption requests
$query = "SELECT * FROM adoption_requests";
$result = $conn->query($query);

// Check if query is successful
if (!$result) {
    // Detailed error reporting
    die("Error executing query: " . $conn->error . " - Query: " . $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Requests</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard Overview</a></li>
                <li><a href="adoption_requests.php">Adoption Requests</a></li> <!-- Current Page -->
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_pets.php">Manage Pets</a></li>
                <li><a href="community_posts.php">Community Posts</a></li>
                <li><a href="admin_profile.php">Admin Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Adoption Requests</h1>
            <?php if ($result && $result->num_rows > 0): ?>
            <table border="1">
                <tr>
                    <th>Request ID</th>
                    <th>User Name</th>
                    <th>Pet Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['pet_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="approve_request.php?id=<?php echo $row['id']; ?>">Approve</a> | 
                        <a href="reject_request.php?id=<?php echo $row['id']; ?>">Reject</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php else: ?>
            <p>No adoption requests found or query failed.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
