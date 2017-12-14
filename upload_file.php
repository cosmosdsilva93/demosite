<?php
	require_once('/config/constants.php');
	require_once('/config/dbconnect.php');

	if (isset($_FILES)) {
		$filedata = array();
		foreach ($_FILES['file']['name'] as $indx => $filename) {
			$inputFile = file($_FILES['file']['tmp_name'][$indx], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			foreach ($inputFile as $line) {
			    $filedata[$indx][] = explode("\t",$line);
			}
		}
		if (count($filedata) > 0) {
			foreach ($filedata as $fileIndx => $fileContents) {
				if ($fileIndx == 0){
					foreach ($fileContents[0] as $headers) {
						$columnsArr[] = str_ireplace(' ', '_', strtolower($headers));
					}
				}
			}
		}
	}