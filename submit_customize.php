<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "okid_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form values
$type = $_POST['type'];
$color = $_POST['color'];
$size = $_POST['size'];
$notes = $_POST['notes'];

// Insert into database
$sql = "INSERT INTO custom_orders (jewellery_type, color, jewellery_size, notes) 
        VALUES ('$type', '$color', '$size', '$notes')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Thank you!</h2><p>Your custom jewellery request has been submitted.</p><a href='customize.html'>Back to Customize</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
