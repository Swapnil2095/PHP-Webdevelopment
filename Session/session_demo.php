<?php
// Session contents are stored on the server and determined by PHP's
// session.save.path. Usually this is /tmp. You can use phpinfo() to view your
// specific settings. Each session is identified by a session-id which is
// stored on the client (browser) and sent with each request. Usually the
// session-id is stored in a cookie but can also be appended to URLs.

// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
  <body>
    <p>Session variables to start</p>
    <?php print_r( $_SESSION ); ?>
    <?php
    // Set session variables
    $_SESSION['name'] = 'John';
    $_SESSION['status'] = 'is dope';
    ?>
    <p>Session variables set. <a href="session_next1.php">Click here to check</a></p>
    <p><?php print_r( $_SESSION ); ?></p>
  </body>
</html>
