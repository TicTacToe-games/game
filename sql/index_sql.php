<!DOCTYPE HTML>  
<html>
<link rel="stylesheet" href="css/TicTacToe.css"></link>
<?php
	include './sql/database.php';

	$username2 = $_POST['username2'];
	if($username2 != '')
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
	}

	$img_url = '';

	if($username2 !== '' && $username !== '' && $password !== '')
	{
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, `username`, `password` FROM `account` WHERE `username`= '$username' AND `password` = '$password'";
		$sql2 = "SELECT id, `username` FROM `account` WHERE `username`= '$username2'";		

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
		        $user1 = $row["id"];	       
		        echo '<br>';
		        /*---*/
		        $sql_user = "UPDATE `users_game` SET `user1`= $user1 WHERE 1";

				if ($conn->query($sql_user) === TRUE) 
				{
				  echo "";
				} 
				else 
				{
				  echo "Error: " . $sql_user . "<br>" . $conn->error;
				}
				/*---*/
		        $img_url = $row["id"];
		    }

		    /*---*/
		    while($row = $result2->fetch_assoc()) 
		    {
		        $user2 = $row["id"];	       		      
		        /*---*/
		        $sql_user = "UPDATE `users_game` SET `user2`= $user2 WHERE 1";

				if ($conn->query($sql_user) === TRUE) 
				{
				  echo "";
				} 
				else 
				{
				  echo "Error: " . $sql_user . "<br>" . $conn->error;
				}
				/*---*/
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

	if($username2 != '')
	{
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