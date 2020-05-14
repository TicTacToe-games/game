<!DOCTYPE html>
<html>
<head>
<title>Морски шах</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/game_css.css"></link>
	<link rel="stylesheet" href="css/message.css"></link>
</head>
<body> 
<?php
	$servername = "localhost";
	$username = "georgi2003";
	$password = "georgi123456";
	$dbname = "refgistrationform";

	$conn = new mysqli($servername, $username, $password, $dbname);
?> 
	<div class="header">
		<h1>МОРСКИ ШАХ</h1>
	</div>  
	<ul>		
		<li style="float: right;"><a href="index.php">Изход</a></li>
		<li style="float: right;"><a href="account.php">Профил</a></li>
		<li style="float: right;"><a href="rating.php">Рейтинг</a></li>
		<li style="float: right;"><a href="info.php">Информация</a></li>
	</ul> 
	
<form method="POST"> 	  	
		<br>		  	 
	   	Х: <input type="password" name="id1" placeholder="Играч 1 id">		
	 	<p style="float: right;">
	 	O:<input type="password" name="id2" style="float: right;" placeholder="Играч 2 id"></p>	
	 	<input type="submit" name="submit">			 		 	 	 		 	
</form>	

    <div class="container" id="main">
	    <span id="turn">Играй</span>   
	   	<div class="box" id="box1"></div>
	    <div class="box" id="box2"></div>
	    <div class="box" id="box3"></div>
	    <div class="box" id="box4"></div>
	    <div class="box" id="box5"></div>
	    <div class="box" id="box6"></div>
	    <div class="box" id="box7"></div>
	    <div class="box" id="box8"></div>
	    <div class="box" id="box9"></div>
    </div>

    <button onclick="replay()">Играй пак</button>
    
<script>
    var turn = document.getElementById("turn"), boxes = document.querySelectorAll("#main div"), X_or_O = 0;	
    
 	var br1 = 0;
 	var br2 = 0;

 	function selectWinnerBoxes(b1,b2,b3)
 	{
     	b1.classList.add("win");
     	b2.classList.add("win");
     	b3.classList.add("win"); 

     	if(b1.innerHTML === "X")
     	{
     		br1++
     		turn.innerHTML = " Печели: " + b1.innerHTML + "<br> Победи: " + br1;    		
     		<?php
     		
			$id1 = $_POST['id1'];
			$id2 = $_POST['id2'];
			// Check connection
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "UPDATE `result` SET `win`= `win` + 1 WHERE id=$id1";

			if ($conn->query($sql) === TRUE) 
			{
			 //   echo "Record updated successfully";
			} 
			else 
			{
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
		?>		    		
     	}
     	else if(b1.innerHTML === "O")
     	{
     		br2++
     		turn.innerHTML = " Печели: " + b1.innerHTML + "<br> Победи: " + br2;     		    		
     	}
     	turn.style.fontSize = "40px";
 	}

    function getWinner()
    {              
		var box1 = document.getElementById("box1"),
	    box2 = document.getElementById("box2"),
	    box3 = document.getElementById("box3"),
	    box4 = document.getElementById("box4"),
	    box5 = document.getElementById("box5"),
	    box6 = document.getElementById("box6"),
	    box7 = document.getElementById("box7"),
	    box8 = document.getElementById("box8"),
	    box9 = document.getElementById("box9");

	 	if(box1.innerHTML !== "" && box1.innerHTML === box2.innerHTML && box1.innerHTML === box3.innerHTML)
	    {
	        selectWinnerBoxes(box1,box2,box3);
	    }
	         
	 	if(box4.innerHTML !== "" && box4.innerHTML === box5.innerHTML && box4.innerHTML === box6.innerHTML)
	    {
	    	selectWinnerBoxes(box4,box5,box6);
	    }
	             
	 	if(box7.innerHTML !== "" && box7.innerHTML === box8.innerHTML && box7.innerHTML === box9.innerHTML)
	    {
	    	selectWinnerBoxes(box7,box8,box9);
	    }
	             
	 	if(box1.innerHTML !== "" && box1.innerHTML === box4.innerHTML && box1.innerHTML === box7.innerHTML)
	    {
	    	selectWinnerBoxes(box1,box4,box7);
	    }
	             
	 	if(box2.innerHTML !== "" && box2.innerHTML === box5.innerHTML && box2.innerHTML === box8.innerHTML)
	    {
	    	selectWinnerBoxes(box2,box5,box8);
	    }
	             
	 	if(box3.innerHTML !== "" && box3.innerHTML === box6.innerHTML && box3.innerHTML === box9.innerHTML)
	    {
	    	selectWinnerBoxes(box3,box6,box9);
	    }
	             
	 	if(box1.innerHTML !== "" && box1.innerHTML === box5.innerHTML && box1.innerHTML === box9.innerHTML)
	    {
	    	selectWinnerBoxes(box1,box5,box9);
	    }
	             
	 	if(box3.innerHTML !== "" && box3.innerHTML === box5.innerHTML && box3.innerHTML === box7.innerHTML)
	    {
	    	selectWinnerBoxes(box3,box5,box7);
	    }
             
    }

	for(var i = 0; i < boxes.length; i++)
	{
    	boxes[i].onclick = function()
    	{     
	  		if(this.innerHTML !== "X" && this.innerHTML !== "O")
	  		{
	  			if(X_or_O % 2 === 0)
	  			{
				  	console.log(X_or_O);
				  	this.innerHTML = "X"; 
				  	turn.innerHTML = "Ред на О";
				  	getWinner();
				  	X_or_O += 1;	        
	     		}
	     		else
	     		{
	     			console.log(X_or_O);
	    			this.innerHTML = "O";
	    			turn.innerHTML = "Ред на Х";
	    			getWinner();
	     			X_or_O += 1;  
	     		}
 			}    
 		}
	}

   	function replay()
   	{           
 		for(var i = 0; i < boxes.length; i++)
 		{
   			boxes[i].classList.remove("win");
   			boxes[i].innerHTML = "";
   			turn.innerHTML = "Играй";
   			turn.style.fontSize = "25px";
    	}
    }
</script>

<div class="alert info">
  <span class="closebtn">&times;</span>  
  <strong>Съобщение!</strong> Ако имате въпроси цъкнете <a style="text-decoration: none;" href="./info.php"> тук</a>.
</div>
<br> <br> <br>
<footer>		   	 
    <div class="footer">
 	 	<p>Имейл за връзка: tictactoe047@gmail.com</p>	 		 	
	</div>
</footer>
<script src="js/messages.js"></script>
</body>
</html>