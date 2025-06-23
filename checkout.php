<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

echo "<h2>Thank you for your purchase!</h2>";
unset($_SESSION['cart']);
?>
