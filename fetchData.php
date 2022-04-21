<?php
  include 'db_conn.php';

        $sql = "SELECT humidity,temp,id,time FROM data ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($GLOBALS['conn'],$sql);
        $row = mysqli_fetch_assoc($result);
        
        echo $row['id']."/".$row['temp']."/".$row['humidity']."/".$row['time'];
        ?>