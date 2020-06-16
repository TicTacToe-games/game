<?php
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "tic_tac_toe";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$id = $_POST['id'];
	if($id!='')
	{
		$name = $_POST['name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$year_birth = $_POST['year_birth'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$url = $_POST['url'];
		$username = $_POST['username'];
		$password1 = md5($_POST['password1']);
		$password2 = md5($_POST['password2']);

		if($password1 == $password2)
		{
			$sql = "UPDATE `user_information` SET `first_name` = '$name',`last_name` = '$last_name',`gender` = '$gender',`date_birth`= $year_birth WHERE id = $id";
			$sql2 = "UPDATE `contacts` SET `phone` = $phone,`email` = '$email' WHERE id = $id";
			$sql3 = "UPDATE `account` SET `username` = $username, `password`= $password1 WHERE id = $id";			

			if ($conn->query($sql) === TRUE) 
			{
			    echo "Record updated successfully";
			} 
			else 
			{
			    echo "Error updating record: " . $conn->error;
			}

			if ($conn->query($sql2) === TRUE) 
			{
			    echo "Record updated successfully";
			} 
			else 
			{
			    echo "Error updating record: " . $conn->error;
			}

			if ($conn->query($sql3) === TRUE) 
			{
			    echo "Record updated successfully";
			} 
			else 
			{
			    echo "Error updating record: " . $conn->error;
			}

			$sql4 = "UPDATE `account` SET `url` = '$url' WHERE id = $id";
			if ($conn->query($sql4) === TRUE) 
			{
				echo "Record updated successfully";
			} 
			else 
			{
			    echo "Error updating record: " . $conn->error;
			}
		}
	}
?>