<?php

	$data = $_REQUEST;
	$user_text = $_REQUEST['user_text'];
	$response = strtoupper( $user_text );
	echo $response;

?>