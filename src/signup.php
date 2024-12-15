<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Validate input
    if (empty($email) || empty($username) || empty($password)) {
        die("All fields are required.");
    }

    // Insert user into the database
    $query = "INSERT INTO user (email, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $email, $username, $password);

    if ($stmt->execute()) {
        header("Location: signin.php"); // Redirect to sign in after successful registration
        exit();
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
}
?>

<!-- HTML form for sign up -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    <div class="register-container">
        <h1 class="register-title">Sign up</h1>
        <form method="POST" action="signup.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your user name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="register-button">Register</button>
            <div class="login-prompt">
                Already have an Account? <a href="signin.php" class="login-link">Login</a>
            </div>
        </form>
    </div>
</body>
</html>