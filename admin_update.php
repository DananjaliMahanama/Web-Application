<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "okid_store");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product by ID
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}

// Update product
if (isset($_POST['update_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];

    if (!empty($image)) {
        move_uploaded_file($image_tmp, "uploaded_img/" . $image);
        $conn->query("UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$name', price='$price' WHERE id=$id");
    }

    header("Location: admin_products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><br><br>
    <title>Edit Product</title>
    <style>body { font-family: Arial; margin: 20px; }
        form { width: 300px; margin: auto; padding: 50px; background: rgba(66, 68, 94, 0.18); border-radius: 8px; }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%; margin: 10px 0; padding: 10px;
        }
        .btn {
            background: #1f1f57;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 105%;
        }
        table { width: 100%; margin-top: 30px; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #f4f4f4; }
        img { height: 100px; }</style>
</head>
<body>

<h2 style="text-align:center;">ADD A NEW PRODUCT</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="product_name" placeholder="Enter product name" required>
    <input type="number" name="product_price" placeholder="Enter product price" required>
    <input type="file" name="product_image" accept="image/*" required>
    <input type="submit" name="add_product" value="Add Product" class="btn"><br><br>
    <center><a href="admin_products.php" class="btn">Back!</a></center>
</form>

</body>
</html>
