<pre>
<?php
$db_user = 'root';
$db_pass = '';
$db_name = 'php101';
$db_host = 'localhost';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}else{
    printf("Connected to db");
}

$result = $mysqli->query("SELECT * FROM objects");

while($row = $result->fetch_object()) {
	$results[] = $row;
}

print_r($results);

$result->close();


// try {
// 	$conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	$query = $conn->query("SELECT ID, post_title, post_date FROM objects ORDER BY post_date");
	
// 	while($row = $query->fetch(PDO::FETCH_OBJ)) {
// 		$results[] = $row;
// 	}
	
// 	print_r($results);
// } catch(PDOException $e) {
//     echo 'ERROR: ' . $e->getMessage();
// }

