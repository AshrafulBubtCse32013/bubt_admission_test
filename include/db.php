<?php
error_reporting(0);
$dbhost = "localhost";
// $dbuser = "abusaim_milon";
$dbuser = "root";
$dbpass = "";
$dbname = "abusaim_bubt";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if (mysqli_connect_error()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


function validation($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($GLOBALS['conn'], $data);
	return $data;
}