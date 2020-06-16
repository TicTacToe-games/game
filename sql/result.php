<?php 
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "tic_tac_toe";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$res = $user1;
    if($br1 > $br2)
	{
		$res = $user1; 
	}
	else if($br1 < $br2)
    {
    	$res = $user2;
    }

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE `results` SET `win`= `win` + 1 WHERE id = $res";

	$conn->query($sql);
	$sql_insert = "INSERT INTO `users_game`(`user1`, `user2`, `date`) VALUES ('$user1', '$user2',current_timestamp())";
	$conn->query($sql_insert);
	$conn->close();
?>