<?php
  //session_start();
  // create short variable names
  $email = $_POST['email'];//get POST variable and store it in a short variable name
  $password = $_POST['password'];//get POST variable and store it in a short variable name
  $_SESSION['email'] = $email;//SESSION Variable for email
?>
<html> <!-- HTML Document -->
<head> <!-- HTML HEAD -->
  <title>Gold Digger</title> <!-- Title of Page -->
  <link rel="stylesheet" href="PageStyles.css"> <!-- Include CSS -->
</head> <!-- Close HTML HEAD -->
<body> <!-- HTML Body -->
<h1>Gold Digger</h1> <!-- H1 for text -->
<?php

	class USER{//simple user class for logging in
	    public $email = "";//email variable
        public $password = "";//password variable
	
	function __construct($email, $password){//constructor for the function
		$this->email = $email;//assign email
		$this->password = $password;//assign password
	}
	}

	$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";//cloud DB host
	$dbuser = "root";//DB user
	$dbpass = "password";//DB password
	$db = "golddigger";//DB name
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);//attempt a connection to the DB and print error on fail
	
	$sql = "SELECT * FROM Users WHERE name='$email' AND pword='$password'";//get user data back
	
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
	
	
	$options = ['cost' => 7];//hashing options
		$phash = password_hash('test', PASSWORD_BCRYPT, $options)."\n";//BCRYPT password hash
		
		
	$sql = "SELECT pword FROM Users WHERE user='$email'";//Selecting password from the user table
	$result = $conn->query($sql);//get result

	$passhash;//passhash will hold the hash password from DB
		
	if ($result->num_rows > 0) {//check the result holds data
		// output data of each row
		while($row = $result->fetch_assoc()) {//loop through all row results
		$passhash = $row["password"];//assign hashed password to passhash
		}
	} else {//no result
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";//state credentials do not match 
		//header('Refresh: 5; URL=login.html');
		//exit;
	}
		
	//echo $passhash.'<br/>';
		
	$passhash = substr( $passhash, 0, 60 );//make sure hash is trimmed to right length
		
	if(password_verify($password, $passhash)){//verify the password
		echo 'Valid';//tell user password is valid
		
		session_start();//begin a PHP session_cache_expire
		$_SESSION['email'] = $email;//hold email in the PHP SESSION
		//header('Location: orderform.php');
		
		
		//echo "<script> location.href='orderform.html'; </script>";
	}
	else{//credentials do not match when password verify happens
		//echo 'Invalid';
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";//state credentials do not match
		//header('Refresh: 5; URL=login.html');
		//exit;
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