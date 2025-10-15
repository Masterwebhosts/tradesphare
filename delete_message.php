<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

include("includes/config.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin.php");
    exit;
} else {
    echo "Invalid request.";
}
?>
