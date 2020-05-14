<?php
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "refgistrationform";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$username_drop = '';

	if ($conn->connect_error) 
	{
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM `account` WHERE 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
	  while($row = $result->fetch_assoc()) 
	  {
	  	$username_drop = $row["username"];
	  }
	} 
	else 
	{
	  echo "0 results";
	}
	$conn->close();
?>