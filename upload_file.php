<?php
	require_once('/config/constants.php');
	require_once('/config/dbconnect.php');

	$msg = '';
	if (isset($_FILES)) {
		$filedata = array();
		$total_no_of_files = count($_FILES['file']['name']);
		//storing all the uploaded files on server
		$parsedFileCount = 0;
		foreach ($_FILES['file']['name'] as $indx => $filename) {
			$inputFile = file($_FILES['file']['tmp_name'][$indx], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			//since all the files have the same structure so extracting column names from the first file
			$dataArr = array();
			foreach ($inputFile as $lineNo => $lineString) {
				$line = explode("\t", $lineString);
				if ($indx == 0 && $lineNo == 0) {
					foreach ($line as $headerNames) {
						$columnsArr[] = str_ireplace(' ', '_', strtolower($headerNames));
					}	
				} elseif ($lineNo > 0) {
					$dataArr[] = $line;
				}
			}
			if (isset($columnsArr, $dataArr)) {
				$dbData = array();
				foreach ($dataArr as $lineData) {
					$dbData[] =  '("' . implode('", "', $lineData) . '")';	
				}
				$qry = 'INSERT INTO ' . TBL_SUBSCRIPTIONS . ' (`' . implode("`, `", $columnsArr) . '`) 
						VALUES ' . implode(', ', $dbData);
				if ($mysqli->query($qry)) {
					$parsedFileCount++;
				}
			}
		}
		$msg = $parsedFileCount . ' out of ' . $total_no_of_files . ' file(s) imported successfully.';
	}

	header('location: index.php?msg=' . $msg);
    exit();