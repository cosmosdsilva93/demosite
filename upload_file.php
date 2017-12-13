<?php
	require_once('/config/constants.php');
	require_once('/config/dbconnect.php');

	if (isset($_FILES)) {
		$filename = $_FILES['file']['name'];
		$filepath = $_FILES['file']['tmp_name'];
		$target =  DOC_ROOT. '/uploads/' . $filename;
		move_uploaded_file($filepath, $target);
	}