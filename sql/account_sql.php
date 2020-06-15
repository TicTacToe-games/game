<?php
	include './sql/database.php';
	include './sql/select.php';
	
	$log = '';
	if($_POST['username'] != '')
	{	
		$log = 'true';
		
		session_start();
		$username = $_SESSION['username'];
		$password = $_SESSION["password"];
		
		$img_url = '';

		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}

		$Select_log = new Select('`username`, `password`', 'account', "`username`= '$username' AND `password` = '$password'");
	    $sql = $Select_log->SELECT_JOIN('user_information');

		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
		    while($row = $result->fetch_assoc()) 
		    {
		        echo "<br><br><h1>Добре дошли: <i>" . $row["username"] . "<br></i></h1>";
		       
				$Select_account = new Select('*', 'account', "`username`= '$username' AND `password` = '$password'");
	      		$sql1 = $Select_account->SELECT_JOIN('user_information');	        
		        
		        $sql2 = $Select_account->SELECT_JOIN('contacts');

		        $sql3 = $Select_account->SELECT_JOIN('result');
		        	        
				$result = $conn->query($sql1);
				$result2 = $conn->query($sql2);
				$result3 = $conn->query($sql3);

				if ($result->num_rows > 0) 
				{
				    while($row = $result->fetch_assoc()) 
				    {
				        echo "<h3>Име: " . $row["first_name"] . "<br> Фамилия: " . $row["last_name"] . "<br> Пол: " . $row["gender"] . "<br> Година на раждане: " . $row["date_birth"] . "</h3>";
				        $img_url = $row["url"];
				    }
				}

				if ($result2->num_rows > 0) 
				{
				    while($row = $result2->fetch_assoc()) 
				    {
				        echo "<h3><br>Телефон: " . $row["phone"] . "<br>Имейл: " . $row["email"] . "<br>id: " . $row["id"] . "<br><br>Потребителско име: " . $row["username"] . "<br> Парола: *****</h3>";
				    }
				}

				if ($result3->num_rows > 0) 
				{
				    while($row = $result3->fetch_assoc()) 
				    {
				        echo "<h2>Рейтинг</h2>" . "<h3>Победи: " . $row["win"] . "</h3>";
				    }
				}
				else 
				{
				    echo "0 results";
				}			      
		    }	   
		} 
		else 
		{
		    echo "0 results";
		}		
		$conn->close();
	}
?>