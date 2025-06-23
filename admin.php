<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color:#1c1c50;
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
      text-align: center;
    }

    .container h2 {
      margin-top: 0;
    }

    footer {
      background-color: #1c1c50;
      color: white;
      text-align: center;
      padding: 10px;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<header>
  <h1>Jewellery Store Admin Panel</h1>
</header>

<nav>
  <ul>
    <li><a href="admin.php">Dashboard</a></li>
    <li><a href="admin_orders.php">Orders</a></li>
    <li><a href="admin_customize.php">View Customize Orders</a></li>
    <li><a href="admin_products.php">Manage Products</a></li>
    <li><a href="admin_contacts.php">View Messages</a></li>

    <li><a href="login.php">Logout</a></li>
  </ul>
</nav>

<div class="container">
  <h2>Welcome, Admin!</h2>
  <p>Use the navigation bar to manage products, view custom orders, and more.</p>
</div>


</body>
</html>
