<?php
$db_user = 'root';
$db_pass = '';
$db_name = 'php101';
$db_host = 'localhost';

//$query = "INSERT INTO objects (post_title, post_content, post_name, post_date)
//		  VALUES ('Demo Title', 'This is demo content.', 'demo-article', NOW())";

$query = "INSERT INTO objects (post_title, post_content, post_name, post_date)
		  VALUES ('Demo Title 3', 'This is demo content.', 'demo-article3', NOW())";
		  
		  

// $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }

// $result = $mysqli->query($query);

// print_r($result);


try {
	$conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result = $conn->query($query);
	
	print_r($result);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

