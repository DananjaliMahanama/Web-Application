<?php
$product_id = intval($_GET['product_id']);
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) die("Connection failed");

$sql = "SELECT name, rating, review, created_at FROM product_reviews 
        WHERE product_id = $product_id AND approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
        <div style="margin-bottom:20px;">
            <strong><?= htmlspecialchars($row['name']) ?></strong> - 
            <em><?= $row['rating'] ?>/5</em><br>
            <p><?= htmlspecialchars($row['review']) ?></p>
            <small><?= $row['created_at'] ?></small>
        </div>
<?php
    endwhile;
else:
    echo "<p>No reviews yet.</p>";
endif;

$conn->close();
?>
