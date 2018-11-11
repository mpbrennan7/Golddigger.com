<?php
  //session_start();
  // create short variable names
  $username = $_POST['username'];
  $password = $_POST['password'];
  //$_SESSION['username'] = $username;
?>
<html>
<head>
  <title>Creating Account</title>
  <link rel="stylesheet" href="PageStyles.css">
</head>
<body>
<h1>Creating Account</h1>
<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$db = "practice";
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$options = ['cost' => 7];
	$phash = password_hash($password, PASSWORD_BCRYPT, $options)."\n";
		
	$sql = "INSERT INTO Users (username, password) VALUES('$username', '$phash')";
		
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
	
	$conn->close();
	header('Location: LoginPage.html');

?>