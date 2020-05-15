<!DOCTYPE HTML>  
<html>	
<head>
	<link rel="stylesheet" href="css/TicTacToe.css"></link>
	<link rel="stylesheet" href="css/dropdown.css"></link>

</head>

<body>
	<div class="header">
		<h1>МОРСКИ ШАХ</h1>
	</div>  
	<ul>		
		<li style="float: right;"><a href="index.php">Изход</a></li>
		<li style="float: right;"><a href="account.php">Профил</a></li>
		<li style="float: right;"><a href="rating.php">Рейтинг</a></li>
		<li style="float: right;"><a href="info.php">Информация</a></li>	 
	</ul> 

	<?php
		$servername = "localhost";
		$username = "georgi2003";
		$password = "georgi123456";
		$dbname = "refgistrationform";

		$conn = new mysqli($servername, $username, $password, $dbname);
	?>	

<form method="POST" action="#section2"> 	  			
		<h1>			
			Вход 
			<br>
		</h1>
	   	<img src="img/avatar.jpg" style="width: 300px; height:300px"> 
	   	<br>
	   	<input style="width: 25%;" type="text" name="username2" placeholder="Потребителско име на съотборник"> 
	   	<div class="dropdown">
		  <button onclick="myFunction()" class="dropbtn">Избор на потребителско име</button>
		  <div id="myDropdown" class="dropdown-content">
		  	<input type="text" placeholder="Търсене..." id="myInput" onkeyup="filterFunction()">
		    <?php  		    	 
		    	if ($conn->connect_error) 
				{
				  die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM `account` WHERE 1";
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
		  </div>
		</div>
	 	<input type="text" name="username" placeholder="Потребителско име" required>
	 	<br>
	 	<input type="password" name="password" placeholder="Парола" required> 	
	  	<br>	 	
	 	<input type="submit" name="submit">
 	 	<br>
 	 	<script src="js/dropdown_index.js"></script>
</form>
<button><a style="text-decoration: none; color: black;" href="http://localhost/Tic%20Tac%20Toe/registration.php">Регистрация</a></button><br><br>
<?php
	include 'sql/index_sql.php';	
?>
<footer>		   	 
    <div class="footer">
 	 	<p>Имейл за връзка: tictactoe047@gmail.com</p>
	</div>
</footer>
</body>
</html>


