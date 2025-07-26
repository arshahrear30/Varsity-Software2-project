<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, name, email, password)
            VALUES ('$username', '$name', '$email', '$password')";

    if ($conn->query($sql)) {
        $_SESSION['user'] = ['name' => $name, 'username' => $username];
        header("Location: dashboard.php");
    } else {
        $error = "Username or email already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"><title>Register</title></head>
<body>
<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
<p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
