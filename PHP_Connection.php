<?php
$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";
	$dbuser = "root";
	$dbpass = "password";
	$db = "golddigger";
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
?>