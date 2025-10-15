<?php
session_start();
include('includes/header.php');
include('includes/config.php');
?>

<section class="contact fade-in">
  <div class="contact-header">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you! Send us a message and our team will get back to you shortly.</p>
  </div>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $message = trim($_POST['message']);

      if ($name && $email && $message) {
          $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
          $stmt->execute([$name, $email, $message]);
          $_SESSION['toast'] = "✅ Your message has been sent successfully!";
          header("Location: contact.php");
          exit;
      } else {
          $_SESSION['toast'] = "⚠️ Please fill in all fields correctly.";
          header("Location: contact.php");
          exit;
      }
  }
  ?>

  <form method="POST" class="contact-form">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
    <button type="submit" class="btn">Send Message</button>
  </form>
</section>

<?php
// إظهار التوست بعد إعادة التحميل
if (isset($_SESSION['toast'])) {
    echo "<script>document.addEventListener('DOMContentLoaded',()=>showToast('{$_SESSION['toast']}','success'));</script>";
    unset($_SESSION['toast']);
}
?>

