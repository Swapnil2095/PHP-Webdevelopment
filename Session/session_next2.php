<?php
session_start();
print_r( $_SESSION );
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
  <body>
    <p><?php print_r( $_SESSION ); ?></p>
    <p><a href="session_demo.php">Click here to start over</a></p>
  </body>
</html>
