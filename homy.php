<?php 
     session_start();
     include 'db_conn.php';
     include_once 'DBfunctions.php';
     if (isset($_SESSION['idpers']) && isset($_SESSION['username'])  ) {

 ?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.plot.ly/plotly-2.9.0.min.js"></script>
<!--
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>-->

	<title>Monitoring</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['username'];?></h1>        
     <h2>Temp:</h2>

     <div id="chart1"></div>

     <script>

          var layout = {
          xaxis: {
          type: 'date',
          title: 'Temps'
          },
          yaxis: {
          title: 'Temperature'
          },
          title:'Courbe de temperature'
          };

          var trace = {
          x: [""],
          y: [""],
          mode: 'lines',
          type: 'scatter',
          name: '2022'
          };//exeperimentating with plotly

          var data = [trace];

          //Plotly.newPlot('chart1', data, layout);


          Plotly.newPlot("chart1", [{x: [""] ,y: [] }] );//visualiser courbe
     </script>

     <h2>Humidity:</h2> 


     <div id="chart2"></div>

     <script>Plotly.newPlot("chart2", [{x: [""], y: [] }] );
     </script>
 
 <h1>Hello, <?php echo $_SESSION['username'];?></h1>        
     <h2>Temp1:</h2>

     <div id="chart3"></div>

     <script>

          var layout = {
          xaxis: {
          type: 'date',
          title: 'Temps'
          },
          yaxis: {
          title: 'Temperature'
          },
          title:'Courbe de temperature'
          };

          var trace = {
          x: [""],
          y: [""],
          mode: 'lines',
          type: 'scatter',
          name: '2022'
          };//exeperimentating with plotly

          var data1 = [trace];

          //Plotly.newPlot('chart3', data1, layout);


          Plotly.newPlot("chart3", [{x: [""] ,y: [] }] );//visualiser courbe
     </script>

     <h2>Humidity1:</h2> 


     <div id="chart4"></div>

     <script>Plotly.newPlot("chart4", [{x: [""], y: [] }] );
     </script>

 <h1>Hello, <?php echo $_SESSION['username'];?></h1>        
     <h2>Temp2:</h2>

     <div id="chart5"></div>

     <script>

          var layout = {
          xaxis: {
          type: 'date',
          title: 'Temps'
          },
          yaxis: {
          title: 'Temperature'
          },
          title:'Courbe de temperature'
          };

          var trace = {
          x: [""],
          y: [""],
          mode: 'lines',
          type: 'scatter',
          name: '2022'
          };//exeperimentating with plotly

          var data2 = [trace];

          //Plotly.newPlot('chart5', data2, layout);


          Plotly.newPlot("chart5", [{x: [""] ,y: [] }] );//visualiser courbe
     </script>

     <h2>Humidity2:</h2> 


     <div id="chart6"></div>

     <script>Plotly.newPlot("chart6", [{x: [""], y: [] }] );
     </script>
 





     <script>
          
          var currentTemp;
          var currentHumid;
         
          var xhttp = new XMLHttpRequest();
          var xhttp2 = new XMLHttpRequest();
          var xhttp3 = new XMLHttpRequest();

          const interval = setInterval(function() {
               xhttp.open("POST", "fetchData.php", true);
               xhttp.send();
               xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) { 
                         
                         currentTempTime  =this.responseText;
                         let myArray = currentTempTime.split("/");//split:fonct predefinie trouvée au object string ;de sring vers array
                         currentTime= myArray[3];
                         currentTemp = myArray[1];
                         currentHumid =  myArray[2];
                         currentId = myArray[0];
                    
                         Plotly.extendTraces('chart1', {x:[[currentTime]], y:[[parseFloat(currentTemp)]] }, [0])
                         Plotly.extendTraces('chart2', {x:[[currentTime]], y:[[parseFloat(currentHumid)]] }, [0])
                    }
                  
                             
                    }
                 



               };
          }, 500);
          const interval = setInterval(function() {
               xhttp2.open("POST", "fetchData1.php", true);
               xhttp2.send();
               xhttp2.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) { 
                         
                         currentTempTime  =this.responseText;
                         let myArray = currentTempTime.split("/");//split:fonct predefinie trouvée au object string ;de sring vers array
                         currentTime= myArray[3];
                         currentTemp = myArray[1];
                         currentHumid =  myArray[2];
                         currentId = myArray[0];
                    
                         Plotly.extendTraces('chart3', {x:[[currentTime]], y:[[parseFloat(currentTemp)]] }, [0])
                         Plotly.extendTraces('chart4', {x:[[currentTime]], y:[[parseFloat(currentHumid)]] }, [0])
                    }
                  
                             
                    }
                 



               };
          }, 500);
          const interval = setInterval(function() {
               xhttp3.open("POST", "fetchData2.php", true);
               xhttp3.send();
               xhttp3.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) { 
                         
                         currentTempTime  =this.responseText;
                         let myArray = currentTempTime.split("/");//split:fonct predefinie trouvée au object string ;de sring vers array
                         currentTime= myArray[3];
                         currentTemp = myArray[1];
                         currentHumid =  myArray[2];
                         currentId = myArray[0];
                    
                         Plotly.extendTraces('chart5', {x:[[currentTime]], y:[[parseFloat(currentTemp)]] }, [0])
                         Plotly.extendTraces('chart6', {x:[[currentTime]], y:[[parseFloat(currentHumid)]] }, [0])
                    }
                  
                             
                    }
                 



               };
          }, 500);


          
               


     </script>






</body>
</html>
<footer>
<?php 
     if($_SESSION['admin']==1) {
?><!-- checking if -->



<h6 > 
     
<?php echo "pin:".Getpin();?>

</h6>
<br>
<?php }?>
<a href="History.php">History</a>

<br><a href="logout.php">Logout</a><br>




</footer>



<?php 

}else{
     header("Location: index.php");
     exit();
}
//servername

  
//sql query to find average
$sql = "select id ,temp,humidity from Data ORDER bY id desc limit 4;";
$result = $conn->query($sql);
$nbr=mysqli_num_rows($result);
//display data on web page
$totalTemp=0;
$totalhumid=0;
while($row = mysqli_fetch_array($result)){
     $totalTemp+=$row['temp'];
     $totalhumid+=$row['humidity'];
}
if($nbr>0){
$avghumid=$totalhumid/$nbr;
$avgtemp=$totalTemp/$nbr;
?>
<h1><?php echo "avg temp:".$avgtemp;
echo "avg humid:".$avghumid; ?></h1>
<?php
}
else
echo "no readings in the table ";
$sql = "select id ,temp,humidity from Data1 ORDER bY id desc limit 4;";
$result = $conn->query($sql);
$nbr=mysqli_num_rows($result);
//display data on web page
$totalTemp=0;
$totalhumid=0;
while($row = mysqli_fetch_array($result)){
     $totalTemp+=$row['temp'];
     $totalhumid+=$row['humidity'];
}
if($nbr>0){
$avghumid1=$totalhumid/$nbr;
$avgtemp1=$totalTemp/$nbr;
?>
<h1><?php echo "avg temp1:".$avgtemp1;
echo "avg humid1:".$avghumid1; ?></h1>
<?php
}
else
echo "no readings in the table ";
$sql = "select id ,temp,humidity from Data2 ORDER bY id desc limit 4;";
$result = $conn->query($sql);
$nbr=mysqli_num_rows($result);
//display data on web page
$totalTemp=0;
$totalhumid=0;
while($row = mysqli_fetch_array($result)){
     $totalTemp+=$row['temp'];
     $totalhumid+=$row['humidity'];
}
if($nbr>0){
$avghumid2=$totalhumid/$nbr;
$avgtemp2=$totalTemp/$nbr;
?>
<h1><?php echo "avg temp2:".$avgtemp2;
echo "avg humid2:".$avghumid2; ?></h1>
<?php
}
else
echo "no readings in the table ";


//close the connection
  
$conn->close();
$temp = 25;
$humidity=65;
if ($temp <25) {
    echo "détection du probleme de temperature pour capteur1 !!!";
}
else {
    echo "";
}
if ($humidity >20) {
    echo "détection du probleme d'humidité pour capteur1 !!!";
}
else {
    echo "";
}
$temp1 = 25;
$humidity1=65;
if ($temp1 <25) {
    echo "détection du probleme de temperature pour capteur2 !!!";
}
else {
    echo "";
}
if ($humidity1 >20) {
    echo "détection du probleme d'humidité pour capteur2 !!!";
}
else {
    echo "";
}
$temp2 = 25;
$humidity2=65;
if ($temp2 <25) {
    echo "détection du probleme de temperature pour capteur3!!!";
}
else {
    echo "";
}
if ($humidity2 >20) {
    echo "détection du probleme d'humidité pour capteur3 !!!";
}
else {
    echo "";
}
 ?>