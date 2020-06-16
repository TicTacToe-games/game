<?php
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "tic_tac_toe";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}

	include './sql/select.php';
	$Select = new Select('*', 'account', '1');
    $sql = $Select->SELECT_db();

	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		echo "<br>";
		while($row = $result->fetch_assoc()) 
		{
			echo '<a>' .  $row["username"] . ' <input type="radio" name="username2" value="' . $row["username"] . '">' . '<br>' . '</a>';
		  	}
	} 
	else 
	{
		echo "0 results";
	}
	$conn->close(); 
?>