<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("Product ID not specified.");
}

$id = intval($_GET['id']);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Check if a new image was uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Update with new image
            $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        // Update without changing image
        $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully. <a href='admin_products.php'>Back to products</a>";
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
        exit;
    }
}

// Fetch current product info
$result = $conn->query("SELECT * FROM products WHERE id=$id");
if ($result->num_rows == 0) {
    die("Product not found.");
}
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
</head>
<body>
  <h2>Edit Product</h2>
  <form method="post" enctype="multipart/form-data">
    Product Name: <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br><br>
    Current Image: <br>
    <img src="uploads/<?= htmlspecialchars($product['image']) ?>" width="100"><br><br>
    Replace Image: <input type="file" name="image"><br><br>
    <input type="submit" value="Update Product">
  </form>
  <p><a href="admin_products.php">Cancel and go back</a></p>
</body>
</html>
