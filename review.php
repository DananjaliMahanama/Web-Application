<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "okid_store";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($conn->real_escape_string($_POST["name"]));
    $email = trim($conn->real_escape_string($_POST["email"]));
    $product = trim($conn->real_escape_string($_POST["product_name"]));
    $rating = intval($_POST["rating"]);
    $review = trim($conn->real_escape_string($_POST["review"]));

    if ($name && $email && $product && $rating && $review) {
        $sql = "INSERT INTO product_reviews (name, email, product_name, rating, review)
                VALUES ('$name', '$email', '$product', $rating, '$review')";
        if ($conn->query($sql) === TRUE) {
            $success = "Thank you! Your review has been submitted.";
        } else {
            $success = "Error: " . $conn->error;
        }
    } else {
        $success = "Please fill out all fields.";
    }
}

// Fetch reviews
$reviews = $conn->query("SELECT * FROM product_reviews ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Reviews</title>
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

        .review-form, .review-list {
            background: white;
            padding: 30px;
            margin: 20px auto;
            max-width: 800px;
            border: 1px solid #ccc;
        }
        h2 { margin-top: 0; }
        textarea,input {
            width: 98%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
        }
           select{
       width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
     }
        .success {
            color: green;
            font-weight: bold;
        }
        .review {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .review:last-child { border-bottom: none; }
        .rating { color: orange; }
          button {
            background-color: #1c1c50;
            color: white;
            padding: 12px;
            border: none;
            cursor: pointer;
            font-size: 16px;
             width: 101%;
        }
        button:hover {
            background-color: #222;
        }

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
       <div class="logo">
        <img src="image/logo.jpg" alt="Logo" />
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

<div class="review-form">
    <h2><center>Submit Your Review</center></h2>
    <?php if (!empty($success)): ?>
        <p class="success"><?= $success ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Product Name:</label>
        
        <select name="product_name" required>
            <option value="">-- Select Product --</option>
            <option>Beaded Ring</option>
            <option>Beaded Necklace</option>
            <option>Beaded Earring</option>
            <option>Beaded Bangle</option>
            <option>Beaded Anklet</option>
        </select>

        <label>Rating (1 to 5):</label>
        <select name="rating" required>
            <option value="">-- Select Rating --</option>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <label>Review:</label>
        <textarea name="review" rows="4" required></textarea>
     <button type="submit">Submit Review</button>
      
    </form>
</div>

<div class="review-list">
    <h2>All Reviews</h2>
    <?php if ($reviews && $reviews->num_rows > 0): ?>
        <?php while ($r = $reviews->fetch_assoc()): ?>
            <div class="review">
                <strong><?= htmlspecialchars($r['name']) ?></strong> on <em><?= htmlspecialchars($r['product_name']) ?></em>
                <div class="rating">
                    <?= str_repeat("★", $r['rating']) . str_repeat("☆", 5 - $r['rating']) ?>
                </div>
                <p><?= htmlspecialchars($r['review']) ?></p>
                <small><?= $r['created_at'] ?></small>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No reviews yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
