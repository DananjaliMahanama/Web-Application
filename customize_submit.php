<?php
// Show all errors (for development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "okid_store");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get values and sanitize
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $jewellery_type = trim($_POST['jewellery_type'] ?? '');
    $jewellery_size = trim($_POST['jewellery_size'] ?? '');
    $color = trim($_POST['color'] ?? '');
    $instructions = trim($_POST['instructions'] ?? '');

    // Validation
    if (!empty($name) && !empty($email) && !empty($jewellery_type) && !empty($jewellery_size) && !empty($color) && !empty($instructions)) {
        $stmt = $conn->prepare("INSERT INTO customize_requests (name, email, jewellery_type,jewellery_size, color, instructions) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssss", $name, $email, $jewellery_type,$jewellery_size, $color, $instructions);
            if ($stmt->execute()) {
                echo "<p class='success'>Thank you! Your customization request has been submitted.</p>";
            } else {
                echo "<p class='error'>Failed to submit: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='error'>Failed to prepare statement.</p>";
        }
    } else {
        echo "<p class='error'>Please fill out all fields.</p>";
    }

    $conn->close();
}
?>
