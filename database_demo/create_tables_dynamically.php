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
    printf("Connected to db.");
}


$objects_table = 
	"CREATE TABLE IF NOT EXISTS objects (
		ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		post_title text NOT NULL,
		post_content longtext NOT NULL,
		post_name varchar(20) NOT NULL,
		post_date datetime NOT NULL,
		PRIMARY KEY (ID)
	)";

if ($mysqli->query($objects_table) === TRUE) {
    printf("Table objects successfully created.\n");
}


$objects_meta_table = 
	"CREATE TABLE IF NOT EXISTS object_meta (
		meta_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		object_id bigint(20) UNSIGNED NOT NULL,
		meta_key varchar (255),
		meta_value longtext,
		PRIMARY KEY (meta_id)
	)";

if ($mysqli->query($objects_meta_table) === TRUE) {
    printf("Table object_meta successfully created.\n");
}


$objects_tags_table = 
	"CREATE TABLE IF NOT EXISTS object_tag_relationships (
		ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		object_id bigint(20) UNSIGNED NOT NULL,
		tag_id bigint(20) UNSIGNED NOT NULL,
		PRIMARY KEY (ID)
	)";

if ($mysqli->query($objects_tags_table) === TRUE) {
    printf("Table object_tag_relationships successfully created.\n");
}

