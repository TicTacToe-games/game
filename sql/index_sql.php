<!DOCTYPE HTML>  
<html>
<?php
	session_start();

	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "tic_tac_toe";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	include './sql/database.php';

	$username2 = $_POST['username2'];
	if($username2 != '')
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
	}

	if($username2 !== '' && $username !== '' && $password !== '')
	{
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `password` = '$password'";
		$sql2 = "SELECT * FROM `account` WHERE `username` = '$username2'";		

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
		        $_SESSION["user1"] = $row["id"];	       
		        echo '<br>';
		        /*---*/
		        $img = $row["url"];
		    }

		    /*---*/
		    while($row = $result2->fetch_assoc()) 
		    {
		        $_SESSION["user2"] = $row["id"];	       		      		        
				/*---*/
		    }
		} 
		else 
		{
		    echo "";		    
		}
	}
	else
	{
		echo 'Не сте въвели нищо!!!<br><br><br>';
	}
?>

<div class="main" id="section2">
</div>

<link rel="stylesheet" href="css/img.css"></link>
<img id="myImg" style="width: 150px; height:150px" alt="<?php echo $username ?>" src="<?php echo $img ?>">

<?php
	if($username2 != '')
	{
		for($i = 0; $i <= 13; $i++)
		{
			echo "<br>";
		}
	}
?>

<div id="myModal" class="modal">
  	<span class="close">&times;</span>
  	<img class="modal-content" id="img01">
  	<div id="caption"></div>
</div>

<script src="js/img.js"></script>

</html>