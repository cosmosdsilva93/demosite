<?php

#this file contains the database connection.
$mysqli = new mysqli("localhost", "root", "", DB);
if ($mysqli === false) {
	die("ERROR: Could not connect. " . $mysqli->connect_error);
}
