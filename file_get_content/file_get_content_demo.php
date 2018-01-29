<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Setup
$url = 'https://php-projects-swapnil6195.c9users.io/PHP-Webdevelopment/Curl_Demo/curl_output.php';
$data = array(
  'i' => 'think',
  'john' => 'morris',
  'is' => 'awesome',
);

// Set options
$options = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($data), // param=value
    // 'ignore_errors' => true,
  ),
);

// Create the stream context
$context  = stream_context_create($options);

// Send the request
$result = file_get_contents($url, false, $context);

// Check for errors
if ($result === FALSE) {
  // Handle any errors
}

print_r($result);
