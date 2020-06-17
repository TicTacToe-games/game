<?php
  include './sql/database.php';
  include './sql/select.php';

  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

  function Rating_res($results)
  {
    if($results > 3 && $results <= 6)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($results > 6 && $results <= 10)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($results > 10 && $results <= 30)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($results > 30 && $results <= 70)
    {
      return '
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
      ';
    }
    else if($results > 70)
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
  
  $Select = new Select('*', 'results', '1');
  $sql = $Select->SELECT_JOIN('accounts');

  $Select = new Select('MAX(`win`), `first_name`, `last_name`', 'results', '1');
  $sql2 = $Select->SELECT_JOIN('user_informations');

  $results = $conn->query($sql);
  $result2 = $conn->query($sql2);

  if ($results->num_rows > 0) 
  {
    echo "<h1>Рейтинг на потребителите</h1>";
    while($row = $results->fetch_assoc()) 
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
             
      $sql3 = "SELECT * FROM `results` JOIN `user_informations` ON `results`.`id` = `user_informations`.`id` WHERE `win` = $win_game";      
      
      $result3 = $conn->query($sql3);
      $user_id = '';  
      while($row = $result3->fetch_assoc()) 
      {         
        $user_id = $row["id"];
        echo '<h2>' . $row["first_name"] . ' ' . $row["last_name"] . '<br>' . 'Победи: ' . $row["win"] . '</h2>';
      }

      $sql4 = "SELECT `url` FROM `accounts` WHERE `id` = $user_id";
      $result4 = $conn->query($sql4);

      while($row = $result4->fetch_assoc()) 
      {        
        $img_url = $row["url"];       
      }
    }
  } 
  else 
  {
    echo "0 results";
  }
  $conn->close();
?>