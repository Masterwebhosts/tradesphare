<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tradesphare</title>

  <!-- CSS الرئيسي للموقع -->
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

  <?php
  // تحميل ملف admin.css فقط داخل صفحة admin.php
  $current_page = basename($_SERVER['PHP_SELF']);
  if ($current_page === 'admin.php') {
      echo '<link rel="stylesheet" href="assets/css/admin.css?v=' . time() . '">';
  }
  ?>
</head>
<body>

<?php
// شريط الإدارة يظهر فقط داخل admin.php
if ($current_page === 'admin.php') {
    echo '
    <div class="admin-header">
        <div class="admin-logo">Tradesphare <span>Admin</span></div>
        <div class="admin-actions">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>';
} else {
    // الهيدر العام للموقع
    echo '
    <header>
      <div class="container">
        <h2>Tradesphare</h2>
        <nav>
          <a href="index.php">Home</a>
          <a href="about.php">About</a>
          <a href="services.php">Services</a>
          <a href="portfolio.php">Our Work</a>
          <a href="contact.php">Contact</a>
          <a href="admin.php" class="admin-link">Admin</a>
          <button id="themeToggle" class="btn theme-btn">🌙</button>


        </nav>
      </div>
    </header>';
}
?>

<main>

