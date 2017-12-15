<?php
	require_once('/config/constants.php');
	require_once('/config/dbconnect.php');

	$msg = '';
	if (isset($_FILES)) {
		$filedata = array();
		$no_of_files = count($_FILES['file']['name']);
		$i = 0;
		//storing all the uploaded files on server
		foreach ($_FILES['file']['name'] as $indx => $filename) {
			$target = DOC_ROOT . '/uploads/' . $filename;
			move_uploaded_file($_FILES['file']['tmp_name'][$indx], $target);
			$inputFile = file($target, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			//since all the files have the same structure so extracting column names from the first file
			if ($indx == 0) {
				$headers = explode("\t", $inputFile[0]);
				foreach ($headers as $headerNames) {
					$columnsArr[] = str_ireplace(' ', '_', strtolower($headerNames));
				}
			}
			$qry = 'LOAD DATA INFILE "' . $target . '" INTO TABLE ' . TBL_SUBSCRIPTIONS . ' IGNORE 1 LINES (`' . implode('`, `', $columnsArr) . '`)';
			if ($mysqli->query($qry)) {
				$i++;
			}
		}
		$msg = $indx + 1 . ' out of ' . $no_of_files . ' files imported successfully.';
	}

	header('location: index.php?msg=' . $msg);
    exit();