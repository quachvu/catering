<?php
	/**
	//in server NetVirture
	$host = "localhost";
	$user = "hdrccoma_cafe";
	$pass = "hdrccafe";
	$db = "hdrccoma_cafe_db";
	*/
	
	//in laptop
	$host = "localhost";
	$user = "root";
	$pass = "";
	
	
	$db = "hdrccoma_catering_db";
	
	$conn = @mysqli_connect($host, $user, $pass)
	or die('Failed to connect to server');
	@mysqli_select_db($conn, $db) or die('Database not available');
	
	
?>
