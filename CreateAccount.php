<?php
  //session_start();
  // create short variable names
  $fullname = $_POST['FullName'];
  $password = $_POST['Password'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $zipcode = $_POST['zipcode'];
  $income = $_POST['Income'];
  $phoneNum = $_POST['phoneNum'];
  $type = $_POST['UserType'];
  //$numCars = $_POST[];
  $numCars = 2;
  $hairColor = $_POST['hair'];
  $eyeColor = $_POST['eye'];
  $height = $_POST['height_feet'];
  $catOrDog = $_POST['catsdogs'];
  $religious = $_POST['religious'];
  $ruralOrUrban = $_POST['ruralurban'];
  $cook = $_POST['cook'];
  $beachOrSki = $_POST['beachski'];
  $introvertOrExtrovert = $_POST['introextro'];
  $genre = $_POST['genre'];
  $relationshipStatus = $_POST['relationship'];
  $aboutYourself = $_POST['aboutyourself'];
  $horoscope = $_POST['horoscope'];
  $lookingFor = $_POST['lookingfor'];
  $favoriteCereal = $_POST['cereal'];
  $shoeSize = $_POST['shoe'];
  
  echo $fullname;
  echo "<br/>";
  echo $password;
  echo "<br/>";
  echo $age;
  echo "<br/>";
  echo $email;
  echo "<br/>";
  echo $zipcode;
  echo "<br/>";
  echo $income;
  echo "<br/>";
  echo $phoneNum;
  echo "<br/>";
  echo $type;
  echo "<br/>";
  echo $hairColor;
  echo "<br/>";
  echo $eyeColor;
  echo "<br/>";
  echo $height;
  echo "<br/>";
  echo $catOrDog;
  echo "<br/>";
  echo $religious;
  echo "<br/>";
  echo $ruralOrUrban;
  echo "<br/>";
  echo $cook;
  echo "<br/>";
  echo $beachOrSki;
  echo "<br/>";
  echo $introvertOrExtrovert;
  echo "<br/>";
  echo $genre;
  echo "<br/>";
  echo $relationshipStatus;
  echo "<br/>";
  echo $aboutYourself;
  echo "<br/>";
  echo $horoscope;
  echo "<br/>";
  echo $lookingFor;
  echo "<br/>";
  echo $favoriteCereal;
  echo "<br/>";
  echo $shoeSize;
  echo "<br/>";
  
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
		
	$sql = "INSERT INTO Users (name, pword, age, email, zip, income, phoneNum, type, numCars, hairColor, eyeColor, height, catOrDog, religious, ruralOrUrban, cook, beachOrSki, introvertOrExtrovert, genre, relationshipStatus, aboutYourself, horoscope, lookingFor, favoriteCereal, shoeSize) VALUES('$fullname', '$phash', $age, $email, $zipcode, $income, $phoneNum, '$type', $numCars, '$hairColor', '$eyeColor', $height, $catOrDog, $religious, $ruralOrUrban, $cook, $beachOrSki, $introvertOrExtrovert, '$genre', '$relationshipStatus', '$aboutYourself', '$horoscope', '$lookingFor', '$favoriteCereal', $shoeSize)";
		
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
	
	$conn->close();
	//header('Location: LoginPage.html');

?>