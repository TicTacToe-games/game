<!DOCTYPE HTML>  
<html>
	<head>	
		<title>Морски шах</title>
		<link rel="stylesheet" href="css/TicTacToe.css"></link>
		<link rel="stylesheet" href="css/navigation_bar.css"></link>
		<link rel="stylesheet" href="css/img.css"></link>
		<link href="./img/icon.jpg" rel="shortcut icon" type="image/x-icon">
	</head>

	<body>	
		<div class="header">
			<h1>Профил</h1>
		</div>  
		<ul>		
			<li style="float: left;"><a href="index.php">Вход</a></li>
			<li style="float: right;"><a href="index.php">Изход</a></li>
			<li style="float: right;"><a href="account.php">Профил</a></li>
			<li style="float: right;"><a href="rating.php">Рейтинг</a></li>
			<li style="float: right;"><a href="info.php">Информация</a></li>			
		</ul>

	 	<br>
		<img src="img/avatar_accaunt.gif" style="width: 150px; height:150px"> 
		<br>
		<form method="POST" action="#section"> 	  			
			<h1>			
				Профил/Вход <br>			
			</h1>	   	
		   	<br>	   		
		 	<input type="text" name="username" placeholder="Потребителско име" required>
		 	<br>
		 	<input type="password" name="password" placeholder="Парола" required> 	
		  	<br>	 	
		 	<input type="submit" name="submit">
	 	 	<br><br>	 	 	
		</form>

		<div class="main" id="section"></div>
		<?php		
			include 'sql/account_sql.php';			
			if($log == 'true') : 		
				echo '<img id="myImg" style="width: 150px; height:150px" src="' . $img_url . '">';		
		?>

		<br>
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
		
		</div><br><br>
		<h1>Aктуализация на профила</h1>

		<form method="POST">		
			<input type="text" name="id" placeholder="id" required>
			<br>
			<input type="text" name="name" placeholder="Име">
			<br>
			<input type="text" name="last_name" placeholder="Фамилия">
			<br>
			<input type="radio" name="gender" value="Мъж">Мъж
			<input type="radio" name="gender" value="Жена">Жена
			<input type="radio" name="gender" value="Друг">Друг
			<br>
			<input type="number" name="year_birth" style=" width: 25%;" placeholder="Година на раждане">
			<br>
			<input type="number" name="phone" style=" width: 25%;" placeholder="Телефон">
			<br>
			<input type="text" name="email" placeholder="Имейл">
			<br>
			<input type="text" name="url" placeholder="url на снимка">
			<br>
			<input type="text" name="username" placeholder="Потребителско име">
			<br>
			<input type="password" name="password1" placeholder="Парола"> 	
			<br>
			<input type="password" name="password2" placeholder="Повтори паролата">
			<br>
			<input type="submit" name="submit" href="./index.php">
			<br>
	 		<button style="width: 7.5%; text-align: center;"><a style="text-decoration: none; color: black;" href="./index.php"> Вход </a></button>
		 	<br><br><br>
		</form>
		
		<?php endif ?>

		<?php
			include './sql/update.php';
		?>
		<footer>		   	 
		    <div class="footer">
		 	 	<p>Имейл за връзка: tictactoe047@gmail.com</p>
			</div>
		</footer>
	</body>
</html>





