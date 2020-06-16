<!DOCTYPE HTML>  
<html>	
<head>
	<title>Морски шах</title>
	<link rel="stylesheet" href="css/TicTacToe.css"></link>
	<link rel="stylesheet" href="css/dropdown.css"></link>
	<link rel="stylesheet" href="css/navigation_bar.css"></link>
	<link href="./img/icon.jpg" rel="shortcut icon" type="image/x-icon">
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

<form method="POST" action="#section2"> 	  			
		<h1>			
			Вход <br>			
		</h1>
	   	<img src="img/avatar.jpg" style="width: 300px; height:300px"> 
	   	<br>
	   	<input style="width: 25%;" type="text" name="username2" placeholder="Потребителско име на съотборник"> 
	   	<div class="dropdown">
		  <button onclick="myFunction()" class="dropbtn">Избор на потребителско име</button>
		  <div id="myDropdown" class="dropdown-content">
		  	<input type="text" placeholder="Търсене..." id="myInput" onkeyup="filterFunction()">
		    <?php 
		    	include './login.php'; 		    	 		    	  		
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


