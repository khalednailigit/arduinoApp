<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Reading<h1>
<table id ="readings">
    
    <thead>
        <tr>
            <th>temperature</th>
            <th>Humidity</th>
            <th>Date & Time</th>
        </tr>
    </thead>
  <?php
   include 'db_conn.php';
    $sql = "SELECT * FROM data WHERe Time > DATE_ADD(CURDATE(), INTERVAL -1 DAY) ;";
    $result = mysqli_query($GLOBALS['conn'],$sql);
    if(mysqli_num_rows($result)>0)
  
    
    while($row = mysqli_fetch_assoc($result))
    {
  
    ?>

    <tr><th><?php echo $row['temp']?></th><th><?php echo $row['humidity']?></th><th><?php echo $row['time']?></th><tr>
   <?php }?>
  
</table>
</body>
<footer>
<a href="home.php">Monitoring</a>
</footer>
</html>



