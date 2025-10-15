<?php
session_start();
$_SESSION['toast'] = "👋 You have logged out.";
session_destroy();
header("Location: login.php");
exit;


