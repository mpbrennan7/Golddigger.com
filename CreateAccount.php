<?php
  //session_start();
  // create short variable names
  $fullname = $_POST['FullName'];//get POST variable and store it in a short variable name
  $password = $_POST['Password'];//get POST variable and store it in a short variable name
  $age = $_POST['age'];//get POST variable and store it in a short variable name
  $email = $_POST['email'];//get POST variable and store it in a short variable name
  $zipcode = $_POST['zipcode'];//get POST variable and store it in a short variable name
  $income = $_POST['Income'];//get POST variable and store it in a short variable name
  $phoneNum = $_POST['phoneNum'];//get POST variable and store it in a short variable name
  $type = $_POST['UserType'];//get POST variable and store it in a short variable name
  //$numCars = $_POST[];//get POST variable and store it in a short variable name
  $numCars = 2;
  $hairColor = $_POST['hair'];//get POST variable and store it in a short variable name
  $eyeColor = $_POST['eye'];//get POST variable and store it in a short variable name
  $height = $_POST['height_feet'];//get POST variable and store it in a short variable name
  $catOrDog = $_POST['catsdogs'];//get POST variable and store it in a short variable name
  $religious = $_POST['religious'];//get POST variable and store it in a short variable name
  $ruralOrUrban = $_POST['ruralurban'];//get POST variable and store it in a short variable name
  $cook = $_POST['cook'];//get POST variable and store it in a short variable name
  $beachOrSki = $_POST['beachski'];//get POST variable and store it in a short variable name
  $introvertOrExtrovert = $_POST['introextro'];//get POST variable and store it in a short variable name
  $genre = $_POST['genre'];//get POST variable and store it in a short variable name
  $relationshipStatus = $_POST['relationship'];//get POST variable and store it in a short variable name
  $aboutYourself = $_POST['aboutyourself'];//get POST variable and store it in a short variable name
  $horoscope = $_POST['horoscope'];//get POST variable and store it in a short variable name
  $lookingFor = $_POST['lookingfor'];//get POST variable and store it in a short variable name
  $favoriteCereal = $_POST['cereal'];//get POST variable and store it in a short variable name
  $shoeSize = $_POST['shoe'];//get POST variable and store it in a short variable name
  
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
<html> <!-- Include HTML for some basis -->
<head> <!-- Begin HTML Head -->
  <title>Creating Account</title> <!-- Script is titled creating account in browser -->
  <link rel="stylesheet" href="PageStyles.css"> <!-- Obtain a stylesheet -->
</head> <!-- Close HTML Head -->
<body> <!-- Begin HTML Body -->
<h1>Creating Account</h1> <!-- Make large header h1 stating that the account is being created -->
<?php

	$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com"; //cloud database
	$dbuser = "root"; //connect with root user
	$dbpass = "password";//DB password
	$db = "golddigger";//DB Name
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);//Attempt connecting to DB
	
	$options = ['cost' => 7];//set up hashing passwords
	$phash = password_hash($password, PASSWORD_BCRYPT, $options)."\n";//Prepare hash
		
	//Create INSERT statement
	$sql = "INSERT INTO Users (name, pword, age, email, zip, income, phoneNum, type, numCars, hairColor, eyeColor, height, catOrDog, religious, ruralOrUrban, cook, beachOrSki, introvertOrExtrovert, genre, relationshipStatus, aboutYourself, horoscope, lookingFor, favoriteCereal, shoeSize) VALUES('$fullname', '$phash', $age, '$email', $zipcode, $income, $phoneNum, '$type', $numCars, '$hairColor', '$eyeColor', $height, $catOrDog, $religious, $ruralOrUrban, $cook, $beachOrSki, $introvertOrExtrovert, '$genre', '$relationshipStatus', '$aboutYourself', '$horoscope', '$lookingFor', '$favoriteCereal', $shoeSize)";
		
	//If query is successful then a record has been inserted to the DB	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {//Otherwise some error was encountered
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
	
	$conn->close();//close DB connection
	//header('Location: LoginPage.html');

?>