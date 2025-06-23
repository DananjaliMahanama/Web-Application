<?php
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM customize_requests ORDER BY submitted_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
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
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f4f4f4;
  }

  h2 {
    text-align: center;
    margin-top: 40px;
    color: #1c1c50;
  }

  .messages-table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    background-color: #fff;
  }

  .messages-table th,
  .messages-table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
  }

  .messages-table th {
    background-color: #1c1c50;
    color: white;
  }

  .messages-table tr:nth-child(even) {
    background-color: s;
  }

  .messages-table tr:hover {
    background-color: #f1f1f1;
  }
  </style>
</head>
<body>
    <header>
  <h1> View Messages - Admin Panel </h1>
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
$sql = "SELECT id, name, email, message, notes, submitted_at FROM customize_requests";
$result = $conn->query($sql);
?>

<table border="1" cellpadding="10">
  
  <tbody>
   <?php
$query = "SELECT * FROM contact_messages";
$result = $conn->query($query);

if ($result === false) {
    echo "Error in SQL query: " . $conn->error;
    exit;
}
?>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
      <th>Submitted At</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
        <td><?php echo $row['submitted_at']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php $conn->close(); ?>
