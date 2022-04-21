<?php
   include 'db_conn.php';
       $x=10;
      while($x>0)
      {
          $x--;
          $temp = random_int(0,20);
          $humid = random_int(0,20);
          $sql = "INSERT INTO DATA (temp,humidity) VALUES ($temp,$humid);";
          $result = mysqli_query($GLOBALS['conn'],$sql);
        // $resultcheck= mysqli_num_rows($result);
        

          sleep(1);
      }
      exit();
    //  header("Location: home.php");
