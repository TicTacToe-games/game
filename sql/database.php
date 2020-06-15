<?php
	include './sql/database_connection.php';
	$Connection = new Connection("localhost", "georgi2003", "georgi123456", "tic_tac_toe");
	$conn = $Connection->Connect();
?>