<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Processing Request</title>
 
</head>
<body>
  <?php if (!isset($_SESSION['message'])): ?>
    <div class="msg success"><h1>New record created successfully</h1></div>
  <?php else: ?>
    <div class="msg success"><h1><?= htmlspecialchars($_SESSION['message']) ?></h1></div>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?> 

  <div >
    <a href="index.php">Back to Registration</a><br><br>
    <a href="view.php">View All Registration</a>
  </div>
</body>
</html>
