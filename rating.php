 <!DOCTYPE html>
<html>
<style>
.checked 
{
  color: orange;
}
</style>
<head>
  <link rel="stylesheet" href="css/TicTacToe.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>
	</title>
</head>
<body>
<div class="header">
  <h1>Рейтинг</h1>
</div>  
    <ul>	
      <li style="float: left;"><a href="index.php">Вход</a></li>
      <li style="float: right;"><a href="index.php">Изход</a></li>
      <li style="float: right;"><a href="account.php">Профил</a></li>
      <li style="float: right;"><a href="rating.php">Рейтинг</a></li>
      <li style="float: right;"><a href="info.php">Информация</a></li>    
    </ul>

<?php
  include 'sql/rating_sql.php';
?>

<link rel="stylesheet" href="css/img.css"></link>
<img id="myImg" style="width: 150px; height:150px" src="<?php echo $img_url ?>">
<br><br><br>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
<div id="caption"></div>
</div>
<script src="js/img.js"></script>

</body>

<footer>         
    <div class="footer">
    <p>Имейл за връзка: tictactoe047@gmail.com</p> 
  </div>
</footer>

</html>