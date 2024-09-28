<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register_style.css">
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="../images/pawslogo.png" alt="PAWster Logo">
            <h2> Find your dream pets! </h2>
            <p>Start for free and turn your ideas into reality</p>
        </div>
        <div class="register-form">
            <h2>Create an Account</h2>
            <!--<form action="register_action.php" method="post"> </from> -->
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" class="register-btn">Register</button>
           
            <p>Already have an account? <a href="logIn.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
<!-- for register functionality-->
<?php
include '../components/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location='registration.php';</script>";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!'); window.location='index.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>