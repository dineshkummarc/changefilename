<?php
	$conn = new mysqli('localhost', 'root', '', 'db_change_file');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>