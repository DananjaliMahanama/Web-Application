<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "okid_store";

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Already logged in
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Secure query
    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ? AND password = SHA2(?, 256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid login credentials";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body { font-family: Arial; background: #f2f2f2; padding: 50px; }
    .login-box { max-width: 400px; margin: auto; background: white; padding: 20px; border: 1px solid #ccc; }
    h2 { text-align: center; }
    input[type=text], input[type=password] { width: 100%; padding: 10px; margin: 10px 0 20px; border: 1px solid #ccc; }
    button { width: 100%; padding: 10px; background-color: #333; color: white; border: none; }
    .error { color: red; text-align: center; }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Admin Login</h2>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="POST">
    <label>Username:</label>
    <input type="text" name="username" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
    
  </form>
</div>

</body>
</html>
