<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// منع الوصول المباشر
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// حذف رسالة
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['toast'] = "🗑 Message deleted successfully.";
    header("Location: admin.php");
    exit;
}

// جلب جميع الرسائل
$stmt = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = count($messages);

include('includes/header.php');
if (isset($_SESSION['toast'])) {
    echo "<script>document.addEventListener('DOMContentLoaded',()=>showToast('{$_SESSION['toast']}','success'));</script>";
    unset($_SESSION['toast']);
}
?>

<section class="admin fade-in">
  <div class="admin-header">
    <h1>Admin Dashboard</h1>
    <div class="admin-top-bar">
      <div class="stats-card">
        <h3>Total Messages</h3>
        <p><?= $total ?></p>
      </div>
      <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
  </div>

  <?php if ($total > 0): ?>
  <div class="message-grid">
    <?php foreach ($messages as $msg): ?>
      <div class="message-card">
        <div class="msg-header">
          <h2><?= htmlspecialchars($msg['name']) ?></h2>
          <a href="?delete=<?= $msg['id'] ?>" class="delete-icon" title="Delete" onclick="return confirm('Delete this message?');">🗑</a>
        </div>
        <p><strong>Email:</strong> <?= htmlspecialchars($msg['email']) ?></p>
        <p><?= nl2br(htmlspecialchars($msg['message'])) ?></p>
        <div class="msg-footer">
          <small>📅 <?= $msg['created_at'] ?></small>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
    <p class="no-data">📭 No messages yet.</p>
  <?php endif; ?>
</section>

<?php include('includes/footer.php'); ?>
