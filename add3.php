<?php
   // connection à la base de données
    // On se connecte à MySQL
$servername = "localhost";
$database = "temphumid"; 
$username = "root";
$password = "";

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }
   
echo "Connected successfully";

if (isset($_GET['humidity'])) // test si la variable existe
{
        if (isset($_GET['temp'])) // test si la variable existe
        {
         
         
                $temp=$_GET['temp'];
                $humid=$_GET['humidity'];
                if(isset($_GET['id'])
$idnetifier=$_GET['id'];

               


                
}
                    if($identifier==1)
                { $sql = "INSERT INTO `data` (`id`,`temp`, `humidity`,`time`) VALUES ('','$temp', '$hum',now())";
                if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                  } else 
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  if($identifier==)2
                  { $sql = "INSERT INTO `data1` (`id`,`temp`, `humidity`,`time`) VALUES ('','$temp', '$hum',now())";
                 if (mysqli_query($conn, $sql)) {
                          echo "New record created successfully";
                    } else 
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                   if($identifier==3)
                    { $sql = "INSERT INTO `data2` (`id`,`temp`, `humidity`,`time`) VALUES ('','$temp', '$hum',now())";
                   if (mysqli_query($conn, $sql)) {
                          echo "New record created successfully";
                      } else 
                           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  
                  
                  mysqli_close($conn);
        }


?>
<div class="




























"></div>