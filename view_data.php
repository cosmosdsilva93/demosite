<?php include('header.php'); ?>


<?php

	$qry = 'SELECT event_date, app_name, subscriber_id, trial_duration
			FROM ' . TBL_SUBSCRIPTIONS . '
			ORDER BY id';
	$res = $mysqli->query($qry);
	$resultArr = $res->fetch_all(MYSQLI_ASSOC);

	if (count($resultArr) > 0) {
		foreach ($resultArr as $indx => $values) {
			//since all the files have the same structure so extracting app name from the first file
			if ($indx == 0) {
				$appName = $values['app_name'];
			}
			$dataArr[$values['event_date']][] = $values;
		}
		//array manipulation as required for the highcharts: Start
		if (isset($dataArr) && count($dataArr) > 0) {
			foreach ($dataArr as $date => $valArr) {
				$datesArr[] = $date;
				$chartDataArr[$date]['subscriptions'] = count($valArr);
				$trialsArr = array();
				foreach ($valArr as $valIndex => $vals) {
					if ($vals['trial_duration'] != '') {
						$trialsArr[] = $vals['trial_duration'];
					}
				}
				$chartDataArr[$date]['trials'] = (count($trialsArr) > 0) ? count($trialsArr) : 0 ;
			}
			if (isset($datesArr)) {
				$datesArr = json_encode($datesArr);
			}
			if (isset($chartDataArr)) {
				foreach ($chartDataArr as $valsArr) {
					foreach ($valsArr as $valName => $valData) {
						$finalData[$valName][] = $valData;
					}
				}
			}
		}
		//array manipulation as required for the highcharts: End
	}else{
		header('location: index.php');
    	exit();
	}

 ?>

<br><br><br><br>
<div id="highcharts"></div>
<br><br>
<div align="center">
	<a href="<?php echo 'index.php'; ?>">
		<button type="button" class="btn btn-warning" style="width:10%;">Back</button>
	</a>
</div>


<?php include('footer.php'); ?>



