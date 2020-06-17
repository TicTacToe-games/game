<?php
	include './sql/database';
	include './sql/select.php';

	$username_drop = '';

	if ($conn->connect_error) 
	{
	  die("Connection failed: " . $conn->connect_error);
	}
	
  	$Select = new Select('*', 'accounts', '1');
  	$sql = $Select->SELECT_db();

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