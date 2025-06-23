<?php
session_start();

$conn = new mysqli("localhost", "root", "", "okid_store");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if ($password === $user['password']) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: index.html"); 
            exit();
        } else {
            $login_error = "Invalid email or password.";
        }
    } else {
        $login_error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - OKID Jewellery</title>
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
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<form action="login.php" method="post">
    <h2><center>Login</center></h2>
    
    <?php if ($login_error): ?>
        <p class="error"><?= $login_error ?></p>
    <?php endif; ?>

    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    
    <button type="submit">Login</button>
    
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</form>

</body>
</html>
