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

          var trace1 = {
          x: [""],
          y: [""],
          mode: 'lines',
          type: 'scatter',
          name: '2022'
          };//exeperimentating with plotly
var data1 = [trace1];

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

          var trace2 = {
          x: [""],
          y: [""],
          mode: 'lines',
          type: 'scatter',
          name: '2022'
          };//exeperimentating with plotly
var data2 = [trace2];

          //Plotly.newPlot('chart5', data2, layout);


          Plotly.newPlot("chart5", [{x: [""] ,y: [] }] );//visualiser courbe
     </script>

     <h2>Humidity2:</h2> 


     <div id="chart6"></div>

     <script>Plotly.newPlot("chart6", [{x: [""], y: [] }] );
     </script>


















const interval = setInterval(function() {
               xhttp.open("POST", "fetchData1.php", true);
               xhttp.send();
               xhttp.onreadystatechange = function() {
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
                    const interval = setInterval(function() {
               xhttp.open("POST", "fetchData2.php", true);
               xhttp.send();
               xhttp.onreadystatechange = function() {
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