<!DOCTYPE HTML>  
<html>	
<link rel="stylesheet" href="css/TicTacToe.css"></link>
<head>	
	<div class="header">
	<h1>Профил</h1>
	</div>  
	<ul>		
		<li style="float: left;"><a href="index.php" >Вход</a></li>
		<li style="float: right;"><a href="index.php" >Изход</a></li>
		<li style="float: right;"><a href="account.php" >Профил</a></li>
		<li style="float: right;"><a href="rating.php" >Рейтинг</a></li>
		<li style="float: right;"><a href="info.php" >Информация</a></li>			
	</ul>
</head>
<body>
 	<br>
	<img src="img/avatar.jpg" style="width: 150px; height:150px"> 
	<br>
	<form method="POST" action="#section"> 	  			
		<h1>			
			Профил/Вход 
		<br>
		</h1>	   	
	   	<br>	   		
	 	<input type="text" name="username" placeholder="Потребителско име" required>
	 	<br>
	 	<input type="password" name="password" placeholder="Парола" required> 	
	  	<br>	 	
	 	<input type="submit" name="submit">
 	 	<br><br>	 	 	
</form>
		
	<?php
		include 'sql/account_sql.php';
	?>

	<?php
		$servername = "localhost";
		$username = "georgi2003";
		$password = "georgi123456";
		$dbname = "refgistrationform";

		$conn = new mysqli($servername, $username, $password, $dbname);
	?>
	<?php 
		$img = '';
		$sql = "SELECT * FROM `result` WHERE id = $img_url";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
		    while($row = $result->fetch_assoc()) 
		    {	        
		        $img = $row["url"];
		    }
		} 
		else
		{
		    echo "0 results";
		}
	?>	 

	<link rel="stylesheet" href="css/img.css"></link>
	<img id="myImg" style="width: 150px; height:150px" src="<?php echo $img ?>">
	<br><br><br>
	<div id="myModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="img01">
		<div id="caption"></div>
	</div>
	<script src="js/img.js"></script>

	<div class="main" id="section1"> 
	  <button><a style="text-decoration: none;" href="#section2">Актуализация на профил</a></button> 
	  <br><br><br>
	</div>

	<div class="main" id="section2">
	</div>
	<h1>Aктуализация на профила</h1>
	<form method="POST"> 
		<br>
		</h1>
		<input type="text" name="id" placeholder="Въведете id" required>
		<br>
		<input type="text" name="name" placeholder="Въведете име">
		<br>
		<input type="text" name="last_name" placeholder="Въведете фамилия">
		<br>
		<input type="radio" name="gender" value="Мъж">Мъж
		<input type="radio" name="gender" value="Жена">Жена
		<input type="radio" name="gender" value="Друг">Друг
		<br>
		<input type="number" name="year_birth" style=" width: 25%;" placeholder="Въведете година на раждане">
		<br>
		<input type="number" name="phone" style=" width: 25%;" placeholder="Въведете телефон">
		<br>
		<input type="text" name="email" placeholder="Въведете имейл">
		<br>
		<input type="text" name="url" placeholder="Въведете url на снимка">
		<br>
		<input type="text" name="username" placeholder="Въведете потребителско име">
		<br>
		<input type="password" name="password1" placeholder="Въведете парола"> 	
		<br>
		<input type="password" name="password2" placeholder="Повтори паролата">
		<br>
		<input type="submit" name="submit">
	 	<br><br><br>
	</form>

	
<?php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['gender'];
	$year_birth = $_POST['year_birth'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$url = $_POST['url'];
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($password1 == $password2)
	{
		$sql = "UPDATE `user_information` SET `first_name` = '$name',`last_name` = '$last_name',`gender` = '$gender',`date_birth`= $year_birth WHERE id = $id";
		$sql2 = "UPDATE `contacts` SET `phone` = $phone,`email` = '$email' WHERE id = $id";
		$sql3 = "UPDATE `account` SET `username` = $username,`password`= $password1 WHERE id = $id";
		$sql4 = "UPDATE `result` SET `url`= '$url' WHERE id = $id";

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

		if ($conn->query($sql4) === TRUE) 
		{
			echo "Record updated successfully";
		} 
		else 
		{
		    echo "Error updating record: " . $conn->error;
		}
	}
?>

</body>
	
<footer>		   	 
    <div class="footer">
 	 	<p>Имейл за връзка: tictactoe047@gmail.com</p>
	</div>
</footer>
</html>





