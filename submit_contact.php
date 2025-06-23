<?php
// Display errors (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "okid_store");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get and sanitize input
    $name = trim($conn->real_escape_string($_POST['name']));
    $email = trim($conn->real_escape_string($_POST['email']));
    $message = trim($conn->real_escape_string($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Message sent successfully! <a href='contact.html'>Go back</a></p>";
        } else {
            echo "<p class='error'>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error'>Please fill out all fields.</p>";
    }

    $conn->close();
}
?>




