<?php
  //session_start();
  // create short variable names
  $fullname = $_POST['FullName'];
  $password = $_POST['Password'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $zipcode = $_POST['zipcode'];
  $income = $_POST[];
  $phoneNum = $_POST['phoneNum'];
  $type = $_POST[];
  $numCars = $_POST[];
  $hairColor = $_POST[];
  $eyeColor = $_POST[];
  $height = $_POST[];
  $catOrDog = $_POST[];
  $religious = $_POST[];
  $ruralOrUrban = $_POST[];
  $cook = $_POST[];
  $beachOrSki = $_POST[];
  $introvertOrExtrovert = $_POST[];
  $genre = $_POST[];
  $relationshipStatus = $_POST[];
  $aboutYourself = $_POST[];
  $horoscope = $_POST[];
  $lookingFor = $_POST[];
  $favoriteCereal = $_POST[];
  $shoeSize = $_POST[];
  

  
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

	$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";
	$dbuser = "root";
	$dbpass = "password";
	$db = "golddigger";
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$options = ['cost' => 7];
	$phash = password_hash($password, PASSWORD_BCRYPT, $options)."\n";
		
	$sql = "INSERT INTO Users (name, pword, age, email, zip, income, phoneNum, type, numCars, hairColor, eyeColor, height, catOrDog, religious, ruralOrUrban, cook, beachOrSki, introvertOrExtrovert, genre, relationshipStatus, aboutYourself, horoscope, lookingFor, favoriteCereal, shoeSize) VALUES('$fullname', '$phash')";
		
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
	
	$conn->close();
	//header('Location: LoginPage.html');

?>