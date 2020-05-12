<?php
  $servername = "localhost";
  $username = "georgi2003";
  $password = "georgi123456";
  $dbname = "refgistrationform";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

  function Rating_res($result)
  {
    if($result > 3 && $result <= 5)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($result > 5 && $result <= 10)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($result > 10 && $result <= 30)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($result > 30 && $result <= 70)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($result > 70)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
      ';
    }
    else
    {
      return '
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
  }

  $sql = "SELECT * FROM `result` JOIN `account` ON `result`.`id` = `account`.`id` WHERE 1";
  $sql2 = "SELECT MAX(`win`), `url`, `first_name`, `last_name` FROM `result` JOIN `user_information` ON `result`.`id` = `user_information`.`id` WHERE 1";
  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);

  if ($result->num_rows > 0) 
  {
    echo "<h1>Рейтинг на потребителите</h1>";
    while($row = $result->fetch_assoc()) 
    {         
      echo '<h2>' . $row["username"] . '<br>' . ' Победи: ' . $row["win"] . '<br>' . ' Рейтинг: ' . Rating_res($row["win"]) . "<br>" . '</h2>';        
    }
  } 

  if ($result2->num_rows > 0) 
  {
    while($row = $result2->fetch_assoc()) 
    {  
      $win_game = $row["MAX(`win`)"];
      echo '<br><h1>Най-добър играч</h1>';            
      $sql3 = "SELECT * FROM `result` JOIN `user_information` ON `result`.`id` = `user_information`.`id` WHERE `win` = $win_game";
      $result3 = $conn->query($sql3); 
      while($row = $result3->fetch_assoc()) 
      {        
        $img_url = $row["url"]; 
        echo '<h2>' . $row["first_name"] . ' ' . $row["last_name"] . '<br>' . 'Победи: ' . $row["win"] . '</h2>';
      }
    }
  } 
  else 
  {
      echo "0 results";
  }
  $conn->close();
?>



  
