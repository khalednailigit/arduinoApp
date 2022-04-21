<html>
<body>
<?php
//servername
$servername = "localhost";
//username
$username = "root";
//empty password
$password = "";
//geek is the database name
$dbname = "temphumid";
  
// Create connection by passing these connection parameters
$conn = new mysqli($servername, $username, $password, $dbname);
  
//sql query to find average
$sql = "SELECT  AVG(temp),AVG(humidity) FROM Data";
$result = $conn->query($sql);
//display data on web page
while($row = mysqli_fetch_array($result)){
    echo "Average items temp  :". $row['AVG(temp)'];
    echo "<br />";
    echo "Average items humidity  :". $row['AVG(humidity)'];
        
}
  
//close the connection
  
$conn->close();
?>
</body>
</html>