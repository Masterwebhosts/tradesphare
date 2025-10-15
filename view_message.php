<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

include("includes/config.php");
include("includes/header.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $msg = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($msg) {
        echo "<h2>Message Details</h2>";
        echo "<p><strong>Name:</strong> {$msg['name']}</p>";
        echo "<p><strong>Email:</strong> {$msg['email']}</p>";
        echo "<p><strong>Message:</strong><br>{$msg['message']}</p>";
        echo "<p><strong>Date:</strong> {$msg['created_at']}</p>";
        echo "<p><a href='admin.php'>← Back to Admin</a></p>";
    } else {
        echo "<p style='color:red;'>Message not found.</p>";
    }
} else {
    echo "<p style='color:red;'>Invalid request.</p>";
}

include("includes/footer.php");
?>
