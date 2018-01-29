<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Basic CURL example----------------------------------------------------------/
// 1. Initialize
$ch = curl_init();

// 2. Set options

// URL to send the request to
curl_setopt($ch, CURLOPT_URL, 'http://www.google.com');

// Return instead of outputting directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Whether to include the header in the output. Set to false here
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. Execute the request and fetch the response. Check for errors
$output = curl_exec($ch);

if ($output === FALSE) {
  echo "cURL Error: " . curl_error($ch);
}

// 4. Close and free up the curl handle
curl_close($ch);

// 5. Display raw output
//print_r($output);

// POST data with CURL---------------------------------------------------------/
// 1. Basic setup
$url = 'https://php-projects-swapnil6195.c9users.io/PHP-Webdevelopment/Curl_Demo/curl_output.php';
$post_data = array(
  'query' => 'some stuff',
  'method' => 'post',
  'ya' => 'hoo',
);

// 2. Initialize
$ch = curl_init();

// 3. Set options
// URL to submit to
curl_setopt($ch, CURLOPT_URL, $url);

// Return output instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// We are doing a POST request
curl_setopt($ch, CURLOPT_POST, 1);

// Adding the post variables to the request
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// 3. Execute the request and fetch the response. Check for errors
$output = curl_exec($ch);

if ($output === FALSE) {
  echo "cURL Error: " . curl_error($ch);
}

// 4. Close and free up the curl handle
curl_close($ch);

// 5. Display raw output
//print_r($output);

// CURL with HTTPS-------------------------------------------------------------/
// 1. Initialize
$ch = curl_init();

// 2. Set options

// URL to send the request to
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com');

// Return instead of outputting directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Whether to include the header in the output. Set to false here
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. Execute the request and fetch the response. Check for errors
$output = curl_exec($ch);

if ($output === FALSE) {
  echo "cURL Error: " . curl_error($ch);
}

// 4. Close and free up the curl handle
curl_close($ch);

// 5. Display raw output
print_r($output);

// Don't use CURLOPT_SSL_VERIFYPEER => false. Allows for "man in the middle"
// attacks. Do this instead: http://php.net/manual/en/function.curl-setopt.php#110457
