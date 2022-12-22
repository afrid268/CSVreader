<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Student statistics</title>
</head>
<body>
<br /><br />  
           <div style="width:900px;">  
                <h3 align="center">student marks analytics bargraph</h3>  
                <br />

<?php 
  $con = new mysqli('localhost','root','Mysql@077','student');
  $query = $con->query("select std,percentage from stud");

  foreach($query as $data)
  {
    $std[] = $data['std'];
    $percentage[] = $data['percentage'];
  }

?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  
  const labels = <?php echo json_encode($std) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'student details',
      data: <?php echo json_encode($percentage) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>


<?php  
 $connect = mysqli_connect("localhost","root","Mysql@077","student");  
 $query = "SELECT remarks, count(*) as std FROM stud GROUP BY remarks";  
 $result = mysqli_query($connect, $query);  
 ?>   
 <html>  
      <head>   
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Remarks', 'Std'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["remarks"]."', ".$row["std"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'student details',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">student marks analytics piechart</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div> 
           <br><br>
    <a href="/smartwinnr%20afrid/main.php">upload another csv file</a> 
      </body>  
 </html> 