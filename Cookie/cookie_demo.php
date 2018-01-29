<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set a cookie
$cookie_name = 'user';
$cookie_value = 'John Morris';
$cookie_time = time() + ( 86400 * 30 ); // 86400 = 1 day
$cookie_domain = '/';
setcookie( $cookie_name, $cookie_value, $cookie_time, $cookie_domain );

// Retrieve a cookie
print_r($_COOKIE);
echo '<p>' . $_COOKIE[$cookie_name] . '</p>';

// Modify a cookie
// $cookie_value = 'Not John Morris';
// setcookie( $cookie_name, $cookie_value, $cookie_time, $cookie_domain );
// print_r($_COOKIE);

// Delete a cookie
// setcookie( 'user', '', time() - 3600, '/' );
// print_r($_COOKIE);

// Check if cookies are enabled
if ( count( $_COOKIE ) > 0 ) {
  echo 'Cookies enabled';
} else {
  echo 'Cookies not enabled';
}
