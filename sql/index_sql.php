<!DOCTYPE HTML>  
<html>
<link rel="stylesheet" href="css/TicTacToe.css"></link>
<?php
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "refgistrationform";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$img_url ='';

	$username2 = $_POST['username2'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username2 !== '' && $username !== '' && $password !== '')
	{
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, `username`, `password` FROM `account` WHERE `username`= '$username' AND `password` = '$password'";
		$sql2 = "SELECT `username` FROM `account` WHERE `username`= '$username2'";		

		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);

		if ($result->num_rows > 0 && $result2->num_rows > 0)
		{
		    while($row = $result->fetch_assoc()) 
		    {
		    	for($i = 0; $i <= 10; $i++)
		    	{
		    		echo "<br>";
		    	}

		        echo '<button><a style="text-decoration: none;" href="game.php">Вход</a></button>';
		        echo "<h1>Добре дошли: <i>" . $row["username"] . "<br></i></h1>";	       
		        echo '<br>';
		        $img_url = $row["id"];
		    }
		} 
		else 
		{
		    echo "0 results";		    
		}
	}
	else
	{
		echo 'Не сте въвели нищо!!!<br><br><br>';
	}
?>

<?php 
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
	$conn->close();
?>	 

<div class="main" id="section2">
	</div>

<link rel="stylesheet" href="css/img.css"></link>
<img id="myImg" style="width: 150px; height:150px" alt="<?php echo $username ?>" src="<?php echo $img ?>">
<?php
	for($i = 0; $i <= 10; $i++)
		    	{
		    		echo "<br>";
		    	}
?>

<br><br><br>
<div id="myModal" class="modal">
  	<span class="close">&times;</span>
  	<img class="modal-content" id="img01">
  	<div id="caption"></div>
</div>

<script src="js/img.js"></script>

</html>