<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $product_option = $_POST['product_option'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO products (name, product_option, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssds", $name, $product_option, $price, $image);

        if ($stmt->execute()) {
            echo "<p>Product added successfully. <a href='admin_products.php'>Back to Product List</a></p>";
        } else {
            echo "<p>Error adding product: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Failed to upload image.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        h2 { margin-bottom: 20px; }
        form { background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #222; color: white; padding: 10px 20px; border: none; border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="POST" enctype="multipart/form-data" action="">
        <label>Product Name:</label>
        <input type="text" name="name" required>

        <label>Product Option (e.g., Color, Size):</label>
        <input type="text" name="product_option" required>

        <label>Product Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Product Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" name="submit" value="Add Product">
    </form>
</body>
</html>
