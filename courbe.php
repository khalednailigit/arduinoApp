
<?php 
     session_start();
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


          Plotly.newPlot("chart1", [{x: [""] ,y: [] }] );
     </script>

     <h2>Humidity:</h2> 


     <div id="chart2"></div>

     <script>Plotly.newPlot("chart2", [{x: [""], y: [] }] );
     </script>



     <script>
          
          var currentTemp;
          var currentHumid;
          var time1;
          var time2;
          var xhttp = new XMLHttpRequest();
          var counter=0;
     

          const interval = setInterval(function() {
               xhttp.open("POST", "fetchData.php", true);
               xhttp.send();
               xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) { 
                         
                         currentTempTime  =this.responseText;
                         let myArray = currentTempTime.split("/");
                         currentTime= myArray[3];
                         currentTemp = myArray[1];
                         currentHumid =  myArray[2];
                         currentId = myArray[0];
                    
                         Plotly.extendTraces('chart1', {x:[[currentTime]], y:[[parseFloat(currentTemp)]] }, [0])
                         Plotly.extendTraces('chart2', {x:[[currentTime]], y:[[parseFloat(currentHumid)]] }, [0])
                         counter++;
                    }
                    /*if(counter > 20) {
                         Plotly.relayout('chart1',{
                         xaxis: {
                         range: [counter-20,counter]
                         }
                         });
                         Plotly.relayout('chart2',{
                         xaxis: {
                         range: [counter-20,counter]
                         }
                         });
                    }*/



               };
          }, 500);



          
               


     </script>






</body>
</html>
<footer>
