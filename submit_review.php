<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$product_id = intval($_POST['product_id']);
$name = $conn->real_escape_string($_POST['name']);
$rating = intval($_POST['rating']);
$review = $conn->real_escape_string($_POST['review']);

if ($name && $rating && $review && $product_id) {
    $sql = "INSERT INTO product_reviews (product_id, name, rating, review) 
            VALUES ($product_id, '$name', $rating, '$review')";
    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "All fields are required.";
}
$conn->close();
?>
