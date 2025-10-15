<?php
include("includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        echo "<p style='color:green;'>Thank you, your message has been sent successfully!</p>";
    } else {
        echo "<p style='color:red;'>Please fill out all fields.</p>";
    }
}
?>
