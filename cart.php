<?php
session_start();

// Connect to database
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Remove item from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Update quantity
if (isset($_GET['update']) && isset($_GET['qty'])) {
    $id = $_GET['update'];
    $qty = intval($_GET['qty']);
    if ($qty > 0) {
        $_SESSION['cart'][$id]['quantity'] = $qty;
    }
}

// Handle checkout
$successMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);

    if (!empty($name) && !empty($email) && !empty($address) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $stmt = $conn->prepare("INSERT INTO orders (name, email, address, product_name, quantity, price) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssid", $name, $email, $address, $item['name'], $item['quantity'], $item['price']);
            $stmt->execute();
        }
        $_SESSION['cart'] = [];
        $successMessage = "Thank you! Your order has been placed.";
    } else {
        $successMessage = "Please fill out all fields and add items to cart.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }

    header {
      background-color: #1c1c50;
      color: #fff;
      padding: 36px 20px;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    nav .logo {
      display: flex;
      align-items: center;
    }

    nav .logo img {
      height: 0px;
      margin-right: 10px;
    }

    nav h1 {
      margin: 0;
    }

    nav ul {
      list-style-type: none;
      display: flex;
      padding: 0;
      margin: 0;
    }

    nav ul li {
      margin: 0 10px;
      position: relative;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #444;
      top: 100%;
      left: 0;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content li {
      padding: 8px 16px;
    }

    .dropdown-content li a {
      color: white;
    }

       
        h1 { text-align: center; }
        table { width: 100%; background: #fff; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #1c1c50; color: white; }
        img { width: 80px; }
        .total { font-weight: bold; }
        .btn {
            padding: 8px 12px;
            background: #1c1c50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover { background: #444; }
        .checkout-form {
            background: white;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border: 1px solid #ccc;
        }
        .checkout-form input, .checkout-form textarea {
            width: 95%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
        }
        
        .success { color: green; font-weight: bold; text-align: center; }
       footer {
            background-color: #1c1c50;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<header>
 <nav>
    
        <h1>OKID Jewellery Store</h1>
      </div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li class="dropdown">
          <a href="#category">Category</a>
          <ul class="dropdown-content">
            
            <li><a href="beaded_neckles.html">Beaded Necklace</a></li>
            <li><a href="beaded_ring.html">Beaded Ring</a></li>
            <li><a href="beaded_earring.html">Beaded Earring</a></li>
            <li><a href="beaded_anklet.html">Beaded Anklet</a></li>
            <li><a href="beaded_bangle.html">Beaded Bangle</a></li>
          </ul>
        </li>
        <li><a href="customize.html">Customize</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="cart.php">Cart </a></li>
        <li><a href="review.php">Reviews</a></li>
        <li><a href="admin_login.html">Admin Login</a></li>
       
       <li><a href="login.html">Login</a></li> 
        <li><a href="signup.html">Sign Up</a></li> 
        <li><a href="logout.php" style="color: red;">Logout</a></li>

      </ul>
    </nav>
    </header>
<h1>Your Shopping Cart</h1>

<?php if (!empty($successMessage)): ?>
    <p class="success"><?= $successMessage ?></p>
<?php endif; ?>

<?php if (!empty($_SESSION['cart'])): ?>
    <table>
        <tr>
            <th>Product</th>
           
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $item):
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
        ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
              
                <td>Rs.<?= number_format($item['price'], 2) ?></td>
                <td>
                    <form method="get" style="display:inline;">
                        <input type="hidden" name="update" value="<?= $id ?>">
                        <input type="number" name="qty" value="<?= $item['quantity'] ?>" min="1" style="width: 60px;">
                        <input type="submit" value="Update" class="btn">
                    </form>
                </td>
                <td>Rs.<?= number_format($itemTotal, 2) ?></td>
                <td>
                    <a href="?remove=<?= $id ?>" onclick="return confirm('Remove this item?');"><button class="btn">Remove</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="total">
            <td colspan="3" align="right">Grand Total</td>
            <td colspan="2">Rs.<?= number_format($total, 2) ?></td>
        </tr>
    </table>

    <div class="checkout-form">
        <h2>Checkout</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="address" placeholder="Your Delivery Address" required></textarea>
            <input type="submit" name="checkout" value="Place Order" class="btn">
        </form>
    </div>

<?php else: ?>
    <p style="text-align: center;">Your cart is empty.</p>
<?php endif; ?>

<footer>
    <p> OKID Jewellery Store</p>
  </footer>s

</body>
</html>
