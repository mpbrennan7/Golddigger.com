<?php
  //session_start();
  // create short variable names
  $email = $_POST['email'];//get POST variable and store it in a short variable name
  $password = $_POST['password'];//get POST variable and store it in a short variable name
  //$_SESSION['email'] = $email;//SESSION Variable for email
?>
<html> <!-- HTML Document -->
<head> <!-- HTML HEAD -->
  <title></title> <!-- Title of Page -->
  <link rel="stylesheet" href="PageStyles.css"> <!-- Include CSS -->
</head> <!-- Close HTML HEAD -->
<body> <!-- HTML Body -->
<h1></h1> <!-- H1 for text -->
<?php

	/*class USER{//simple user class for logging in
	    public $email = "";//email variable
        public $password = "";//password variable
	
	function __construct($email, $password){//constructor for the function
		$this->email = $email;//assign email
		$this->password = $password;//assign password
	}
	}*/
	require_once("class_structure.php");
	$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";//cloud DB host
	$dbuser = "root";//DB user
	$dbpass = "password";//DB password
	$db = "golddigger";//DB name
	
	$user = '';
	$passwd = "";

	$curr_user;	
	
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);//attempt a connection to the DB and print error on fail
	
	$sql = "SELECT * FROM Users WHERE email='$email' AND pword='$password'";//get user data back
	
	$user_array = array();//make a user array for holding user objects
	 
    // if($result = $query->get_result()){
	if($result = $conn->query($sql)){//obtain the result

	while($obj = $result->fetch_object()){
		$temp_user = new USER($obj->email, $obj->password);//make new user objects
		$user_array[] = $temp_user;//assign the array to the user object
	}
  
	$output;//output for displaying data from DB upon debugging

	for($i = 0; $i < count($user_array); $i++){//loop through all objects in array
		$output = $user_array[$i];//assign output to the object in the user array

	};
		
	$sql = "SELECT pword FROM Users WHERE email='$email'";//Selecting password from the user table
	$result = $conn->query($sql);//get result

	
	
	$passhash;//passhash will hold the hash password from DB
		
	if ($result->num_rows > 0) {//check the result holds data
		// output data of each row
		while($row = $result->fetch_assoc()) {//loop through all row results
		$passhash = $row["pword"];//assign hashed password to passhash
		}
	} else {//no result
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";//state credentials do not match 
		header('Refresh: 5; URL=LoginPage.html');
		exit;
	}
		
	$passhash = substr( $passhash, 0, 60 );//make sure hash is trimmed to right length
	
	if(password_verify($password, $passhash)){//verify the password
		
		$allinfo = "SELECT * FROM Users WHERE email='$email'";//Selecting password from the user table
		//$allresult = $conn->query($allinfo);//get result
		
		$curruserarray = array();//make a user array for holding user objects
	 
		if($currresult = $conn->query($allinfo)){//obtain the result
			while($currobj = $currresult->fetch_object()){
				//echo "here";
				$curr_user = new User($currobj->name, $currobj->pword, $currobj->age, $currobj->email, $currobj->zip, $currobj->income, $currobj->phoneNum, $currobj->type, $currobj->hairColor, $currobj->eyeColor, $currobj->height, $currobj->catOrDog, $currobj->religious, $currobj->cook, $currobj->beachOrSki, $currobj->introvertOrExtrovert, $currobj->genre, $currobj->relationshipStatus, $currobj->aboutYourself, $currobj->horoscope, $currobj->lookingFor, $currobj->favoriteCereal, $currobj->shoeSize);//make new user objects
				//$curruserarray[] = $temp_user;//assign the array to the user object
				//echo $currobj->name;
			}
		} 
		echo 'Valid';//tell user password is valid
		
		session_start();//begin a PHP session_cache_expire
		$_SESSION['curr_user'] = $curr_user;
		$_SESSION['index'] = 0;

		header('Location: results.php');
		//echo "<script> location.href='orderform.html'; </script>";
	}
	else{//credentials do not match when password verify happens
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";//state credentials do not match
		header('Refresh: 5; URL=LoginPage.html');
		exit;
	}
		
	if ($i != count($user_array) - 1){//loop through objects in user array
		echo "\n";//insert newlines when debugging
	}
	
	$result->close();//close DB connection
		
	$conn->close();//close DB connection
	
	}
	
	echo $user;
	echo $passwd;
	
?>