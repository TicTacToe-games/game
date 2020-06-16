<?php
	include './sql/database.php';

	$name = $_POST['name'];
	if($name != '')
	{
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$year_birth = $_POST['year_birth'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password1 = md5($_POST['password1']);
		$password2 = md5($_POST['password2']);
	
		if($password1 != $password2)
		{
			echo "Паролата не съвпада!!!";
		}
		
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "INSERT INTO `user_information`(`first_name`, `last_name`, `gender`, `date_birth`) VALUES ('$name', '$last_name','$gender', $year_birth)";
		$sql1 = "INSERT INTO `contacts`(`phone`, `email`) VALUES ($phone, '$email')";
		$sql2 = "INSERT INTO `account`(`username`, `url`, `password`) VALUES ('$username', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', '$password1')";
		if($name != '')
		{
			$sql3 = "INSERT INTO `results`(`win`) VALUES (0)";
		}

		if ($conn->query($sql) === TRUE)
		{
		    echo "Създаден е нов запис!";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		if ($conn->query($sql1) === TRUE)
		{
		    echo "";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}

		if ($conn->query($sql2) === TRUE)
		{
		    echo "";
		} else {
		    echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
		if ($conn->query($sql3) === TRUE)
		{
		    echo "";
		} else {
		    echo "Error: " . $sql3 . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>