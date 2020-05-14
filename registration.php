<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="css/TicTacToe.css"></link>
</head>
<body>
<form method="POST"> 
	<div class="header">
		<h1>МОРСКИ ШАХ</h1>
	</div>
	<ul>		
		<li style="float: left;"><a href="index.php">Вход</a></li>
		<li style="float: right;"><a href="index.php">Изход</a></li>
		<li style="float: right;"><a href="account.php">Профил</a></li>
		<li style="float: right;"><a href="rating.php">Рейтинг</a></li>
		<li style="float: right;"><a href="info.php">Информация</a></li>	 
	</ul> 
	<h1>	  	
	<br>
		Регистрация 
	<br>
		<img src="img/avatar.jpg" style="width: 300px; height:300px"> 
	<br>
	</h1>	
	<input type="text" name="name" placeholder="Въведете име" required>
	<br>
	<input type="text" name="last_name" placeholder="Въведете фамилия" required>
	<br>
	<input type="radio" name="gender" value="Мъж">Мъж
	<input type="radio" name="gender" value="Жена">Жена
	<input type="radio" name="gender" value="Друг">Друг
	<br>
	<input type="number" name="year_birth" style="width: 25%;" placeholder="Въведете година на раждане" required>
	<br>
	<input type="number" name="phone" style="width: 25%;" placeholder="Въведете телефон" required>
	<br>
	<input type="text" name="email" placeholder="Въведете имейл" required>
	<br>
	<input type="text" name="username" placeholder="Въведете потребителско име" required>
	<br>
	<input type="password" name="password1" placeholder=" Въведете парола" required> 	
	<br>
	<input type="password" name="password2" placeholder="Повтори паролата" required>
	<br>
	<input type="submit" name="submit">
 	<br>
 	<button style="width: 7.5%; text-align: center;"><a style="text-decoration: none; color: black;" href="http://localhost/Tic%20Tac%20Toe/index.php"> Вход </a></button>
 	<br>	
</form>

<?php
	include 'sql/registration_sql.php';
?>

</body>
</html>


