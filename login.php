<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = $admin['username'];
        $_SESSION['toast'] = "✅ Logged in successfully!";
        header("Location: admin.php");
        exit;
    } else {
        $_SESSION['toast'] = "❌ Invalid username or password!";
        header("Location: login.php");
        exit;
    }
}
?>

<?php include('includes/header.php'); ?>

<section class="login fade-in">
  <h1>Admin Login</h1>
  <form method="POST" class="login-form">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn">Login</button>
  </form>
</section>

<?php
if (isset($_SESSION['toast'])) {
    echo "<script>document.addEventListener('DOMContentLoaded',()=>showToast('{$_SESSION['toast']}','info'));</script>";
    unset($_SESSION['toast']);
}
?>

<?php include('includes/footer.php'); ?>
