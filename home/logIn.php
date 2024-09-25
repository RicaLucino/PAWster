<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/register_style.css">
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="../images/pawslogo.png" alt="Logo of PAWster">
            <h2>Find your dream pets!</h2>
            <p>Start for free and get attractive offers from the community</p>
        </div>
        <div class="login-form">
            <h2>Login to your Account</h2>
            <form action="logIn.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
               
                <button type="submit" class="login-btn">Login</button>
                
            </form>
            
        </div>
    </div>
</body>
</html>


<!-- for log in functionality -->
<?php
include '../components/connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // hash the password for security

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header('Location: index.html');
    } else {
        echo "<script>alert('Invalid credentials'); window.location='index.php';</script>";
    }
}
?>
