<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "okid_store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($password)) {
       
        $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($check->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            // Insert user
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);
            if ($stmt->execute()) {
                $success = "Registration successful! Redirecting to login...";
                header("refresh:2;url=login.php");
            } else {
                $error = "Error occurred. Please try again.";
            }
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - OKID Jewellery</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('image/11 (1).png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background: #fff;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 40px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #1c1c50;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .success {
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2><center>Sign Up</center></h2>

        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
