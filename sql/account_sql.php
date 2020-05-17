<link rel="stylesheet" href="css/TicTacToe.css"></link>
<div class="main" id="section">
	</div>
<?php
	include './sql/database.php';
	include './sql/select.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$img_url = '';

	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}

	$Select1 = new Select('`username`, `password`', 'account', "`username`= '$username' AND `password` = '$password'");
    $sql = $Select1->SELECT_JOIN('user_information');

	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "<h1>Добре дошли: <i>" . $row["username"] . "<br></i></h1>";
	       
			$Select2 = new Select('*', 'account', "`username`= '$username' AND `password` = '$password'");
      		$sql1 = $Select2->SELECT_JOIN('user_information');	        
	        
	        $sql2 = $Select2->SELECT_JOIN('contacts');

	        $sql3 = $Select2->SELECT_JOIN('result');
	        	        
			$result = $conn->query($sql1);
			$result2 = $conn->query($sql2);
			$result3 = $conn->query($sql3);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "<h3>Име: " . $row["first_name"] . "<br> Фамилия: " . $row["last_name"] . "<br> Пол: " . $row["gender"] . "<br> Година на раждане: " . $row["date_birth"] . "</h3>";
			        $img_url = $row["id"];
			    }
			}

			if ($result2->num_rows > 0) {
			    // output data of each row
			    while($row = $result2->fetch_assoc()) {
			        echo "<h3><br>Телефон: " . $row["phone"] . "<br>Имейл: " . $row["email"] . "<br>id: " . $row["id"] . "<br><br>Потребителско име: " . $row["username"] . "<br> Парола: *****</h3>";
			    }
			}

			if ($result3->num_rows > 0) {
			    // output data of each row
			    while($row = $result3->fetch_assoc()) {
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
?>

