<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <body>
    <p><?php print_r( $_SESSION ); ?>
    <p>Name: <?php echo $_SESSION['name']; ?></p>
    <p>Status: <?php echo $_SESSION['status']; ?></p>
    <p><a href="session_next2.php">Click here to destroy session</a></p>
  </body>
</html>
