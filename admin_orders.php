<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders ORDER BY submitted_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <html>
<head>
    <title>Admin -Orders</title>

  
 
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
    

    table {
      width: 95%;
      margin: 30px auto;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #1c1c50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    footer {
      text-align: center;
      padding: 10px;
      background-color: #1c1c50;
      color: white;
      margin-top: 30px;
    }
  </style>
</head>
<body>

<header>
  <h1>Customize Requests - Admin Panel</h1>
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
<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "okid_store");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch customization requests
$sql = "SELECT id,name, email, address, product_name, quantity, price FROM admin_orders";
$result = $conn->query($sql);
?>

<table border="1" cellpadding="10">
  
  <tbody>
   <?php
$query = "SELECT * FROM orders";
$result = $conn->query($query);

if ($result === false) {
    echo "Error in SQL query: " . $conn->error;
    exit;
}
?>

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
       <th>Email</th>
      <th>Address</th>
      <th>product_name</th>
      <th>quantity</th>
      <th>price</th>
      
    </tr>
  </thead>
  <tbody>
   <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                 <td>{$row['name']}</td>
                 <td>{$row['email']}</td>
                <td>{$row['address']}</td>
                 <td>{$row['product_name']}</td>
                   <td>{$row['quantity']}</td>
                <td>{$row['price']}</td>
               
               
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No orders found.</td></tr>";
    }
    $conn->close();
    ?>
  </table>
</body>
</html>



