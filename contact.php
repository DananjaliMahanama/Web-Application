<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "okid_store");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $msg = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message)
            VALUES ('$name', '$email', '$msg')";

    if ($conn->query($sql) === TRUE) {
        $message = "Thank you! Your message has been sent.";
    } else {
        $message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - OKID Jewellery</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f8f8;
        }

        nav {
            background-color: #222;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav-links a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
            top: 35px;
        }

        .dropdown-content a {
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #444;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .banner {
            background-image: url('images/contact-banner.jpg'); /* Replace with your banner image */
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 36px;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        .contact-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #444;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #1c1c50;
            border-radius: 4px;
            resize: vertical;
        }

        form button {
            background-color: #1c1c50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #1c1c50;
        }

        .footer {
            background-color: #1c1c50;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }

        .success {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">OKID</div>
        <div class="nav-links">
            <a href="index.html">Home</a>
            <div class="dropdown">
                <a href="#">Category</a>
                <div class="dropdown-content">
                    <a href="beaded_necklace.php">Beaded Necklace</a>
                    <a href="beaded_ring.php">Beaded Ring</a>
                    <a href="beaded_earring.php">Beaded Earring</a>
                    <a href="beaded_bangle.php">Beaded Bangle</a>
                    <a href="beaded_anklet.php">Beaded Anklet</a>
                </div>
            </div>
            <a href="customize.html">Customize</a>
            <a href="about.html">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="view_cart.php">Cart</a>
            <a href="admin_login.php">Admin Login</a>
            <a href="admin_logout.php">Logout</a>
        </div>
    </nav>

    <div class="banner">Contact Us</div>

    <div class="contact-container">
        <h2>We’d Love to Hear From You!</h2>
        <?php if (!empty($message)): ?>
            <p class="success"><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="contact.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="6" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <div class="footer">
        &copy; OKID Jewellery. All rights reserved.
    </div>

</body>
</html>
