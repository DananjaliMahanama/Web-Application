<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("Product ID not specified.");
}

$id = intval($_GET['id']);


$result = $conn->query("SELECT image FROM products WHERE id=$id");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageFile = "uploads/" . $row['image'];
    if (file_exists($imageFile)) {
        unlink($imageFile);
    }
}

$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: admin_products.php");
    exit;
} else {
    echo "Error deleting product: " . $conn->error;
}
?>
