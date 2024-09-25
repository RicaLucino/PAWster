<?php
// Start session and connect to the database
session_start();
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pawster';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard Overview</a></li>
                <li><a href="adoption_requests.php">Adoption Requests</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_pets.php">Manage Pets</a></li>
                <li><a href="community_posts.php">Community Posts</a></li>
                <li><a href="admin_profile.php">Admin Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Manage Users</h1>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
