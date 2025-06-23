<?php
// Optional: Require admin login
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "okid_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all contact messages
$sql = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        h1 {
            color: #222;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background: #222;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        a.button {
            display: inline-block;
            background-color: #222;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a.button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

    <h1>Submitted Contact Messages</h1>
    <a href="admin_dashboard.php" class="button">← Back to Admin Dashboard</a>

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
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                        <td><?= $row['submitted_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">No contact messages found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
