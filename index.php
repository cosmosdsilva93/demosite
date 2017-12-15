<?php include('header.php'); ?>

<?php
	//a data check to ensure that the view data button is visible when there is already uploaded data in the db.
	$qry = 'SELECT event_date, app_name, subscriber_id, trial_duration
			FROM ' . TBL_SUBSCRIPTIONS . '
			ORDER BY id';
	$res = $mysqli->query($qry);
	$resultArr = $res->fetch_all(MYSQLI_ASSOC);

?>

<br>
<div class="col-md-4"></div>
<div class="col-md-4">
	<form action="<?php echo 'upload_file.php'; ?>" method="POST" role="form" enctype="multipart/form-data">
		<legend>Import Data</legend>
		<?php if (isset($_GET['msg']) && $_GET['msg'] != '') {  ?>
			<div class="alert alert-success" align="center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_GET['msg']; ?>
			</div>
		<?php } ?>
		<div class="form-group">
			<input type="file" name="file[]" class="form-control" required="required" multiple="multiple" placeholder="Select a file">
		</div>
		<div align="center">
			<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	</form>
	<br><br>
	<?php if ((isset($_GET['msg']) && $_GET['msg'] != '') || count($resultArr) > 0) {  ?>
		<div align="center">
			<a href="<?php echo 'view_data.php'; ?>">
				<button type="button" class="btn btn-success" style="width:50%;">View Data</button>
			</a>
		</div>
	<?php } ?>
</div>
<div class="col-md-4"></div>

<?php include('footer.php'); ?>


