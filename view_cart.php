<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f0f0; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #222; color: white; }
        img { width: 80px; height: 80px; object-fit: cover; }
    </style>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php $grand_total = 0; ?>
        <?php foreach ($cart as $item): ?>
            <tr>
                <td><img src="uploads/<?= htmlspecialchars($item['image']) ?>"></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= number_format($item['price'], 2) ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                <?php $grand_total += $item['price'] * $item['quantity']; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"><strong>Grand Total</strong></td>
            <td><strong>Rs.<?= number_format($grand_total, 2) ?></strong></td>
        </tr>
    </table>
    <br>
    <a href="index.html">Continue Shopping</a>
</body>
</html>
