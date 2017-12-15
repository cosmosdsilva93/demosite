	</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.3/highcharts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.3/js/modules/exporting.js"></script>
		<script type="text/javascript">
			//code for the highchart
			Highcharts.chart('highcharts', {
			    chart: {
			        type: 'column'
			    },
			    title: {
			        text: '<?php echo $appName; ?>'
			    },
			    xAxis: {
			        categories: <?php echo $datesArr; ?>,
			        crosshair: true
			    },
			    yAxis: {
			        min: 0,
			        title: {
			            text: 'Count'
			        }
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0"><b>{point.y}</b></td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: true
			    },
			    plotOptions: {
			        column: {
			            pointPadding: 0.2,
			            borderWidth: 0
			        }
			    },
			    series: [{
			        name: 'Subscriptions',
			        data: [<?php echo implode(', ', $finalData['subscriptions']); ?>]

			    }, {
			        name: 'Trials',
			        data: [<?php echo implode(', ', $finalData['trials']); ?>]

			    }]
			});

		</script>
	</body>
</html>
