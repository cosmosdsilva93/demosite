<?php include('header.php'); ?>

<br>
<div class="col-md-4"></div>
<div class="col-md-4">
	<form action="<?php echo 'upload_file.php'; ?>" method="POST" role="form" enctype="multipart/form-data">
		<legend>Import Data</legend>
		<div class="form-group">
			<input type="file" name="file" class="form-control" id="" placeholder="Select a file">
		</div>
		<div align="center">
			<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	</form>
</div>
<div class="col-md-4"></div>

<?php include('footer.php'); ?>


