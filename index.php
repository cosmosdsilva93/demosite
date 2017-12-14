<?php include('header.php'); ?>

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
			<input type="file" name="file[]" class="form-control" id="" multiple="multiple" placeholder="Select a file">
		</div>
		<div align="center">
			<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	</form>
</div>
<div class="col-md-4"></div>

<?php include('footer.php'); ?>


