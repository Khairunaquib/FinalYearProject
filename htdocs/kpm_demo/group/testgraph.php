<?php
	
	$conn = new mysqli('localhost', 'naquib', 'naquib123', 'users');
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],

		  <?php
			$query = "select * from temp_data_test";
			$res=mysqli_query($conn,$query);
				while($data=mysqli_fetch_array($res)){
					$premise=$data['time'];
					$id=$data['temp'];
			?>
				['<?php echo $premise;?>',<?php echo $id;?>],
				<?php
				}		  
			?>

        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>