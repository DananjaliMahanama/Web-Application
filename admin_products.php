<?php
$conn = new mysqli("localhost", "root", "", "okid_store");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle product upload
if (isset($_POST['add_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];

    $upload_path = "uploaded_img/" . basename($image);

    if (move_uploaded_file($image_tmp, $upload_path)) {
        $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: admin_products.php");
    exit;
}

// Fetch all products
$select = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Products</title>
    <style>
          body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #1c1c50;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      background-color: #1c1c50;
      display: flex;
      justify-content: center;
    }

    nav ul li {
      margin: 0;
    }

    nav ul li a {
      display: block;
      padding: 15px 25px;
      color: #fff;
      text-decoration: none;
    }

    nav ul li a:hover {
      background-color: #555;
    }

    .container {
      padding: 40px;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #eee;
    }

    .action-buttons button {
      margin-right: 5px;
    }
        
     
        form { width: 300px; margin: auto; padding: 55px; background:rgba(66, 68, 94, 0.18); border-radius: 8px; }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%; margin: 10px 0; padding: 10px;
        }
        .btn {
            background: #1f1f57;
            
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 106%;
        }
        table { width: 100%; margin-top: 40px; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #f4f4f4; }
        img { height: 100px; }
    </style>
</head>
<body>


<header>
  <h1>Admin Panel - Manage Products</h1>
</header>

<nav>
  <ul>
    <li><a href="admin.php">Dashboard</a></li>
  <li><a href="admin_orders.php">Orders</a></li>
    <li><a href="admin_customize.php">View Customize Orders</a></li>
    <li><a href="admin_products.php">Manage Products</a></li>
    
     <li><a href="admin_contacts.php">View Messages</a></li>

    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
<h2 style="text-align:center;">ADD A NEW PRODUCT</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="product_name" placeholder="Enter product name" required>
    <input type="number" name="product_price" placeholder="Enter product price" required>
    <input type="file" name="product_image" accept="image/*" required>
    <input type="submit" name="add_product" value="Add Product" class="btn">
</form>

<table>
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $select->fetch_assoc()) { ?>
        <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" alt=""></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td>Rs.<?php echo number_format($row['price'], 2); ?>/-</td>
            <td>
                <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn">Edit</a><br><br>
                <a href="admin_products.php?delete=<?php echo $row['id']; ?>" class="btn">Delete</a>
                
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
