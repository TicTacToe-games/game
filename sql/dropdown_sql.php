<?php
	include './sql/database';
	
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