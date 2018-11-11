<?php
  session_start();
  // create short variable names
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username;
?>
<html>
<head>
  <title>Brian's Light Bulb Shop - Order Results</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Brian's Light Bulb Shop</h1>
<?php

	class USER{
	    public $username = "";
        public $password = "";
	
	function __construct($username, $password){
		$this->username = $username;
		$this->password = $password;
	}
	}

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$db = "practice";
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
	
	$user_array = array();
	 
    // if($result = $query->get_result()){
	if($result = $conn->query($sql)){

	while($obj = $result->fetch_object()){
		$temp_user = new USER($obj->username, $obj->password);
		$user_array[] = $temp_user;
	}
  
	$output;

	for($i = 0; $i < count($user_array); $i++){
		$output = $user_array[$i];

	};
	
	
	$options = ['cost' => 7];
		$phash = password_hash('test', PASSWORD_BCRYPT, $options)."\n";
		
		
	$sql = "SELECT password FROM Users WHERE username='$username'";
	$result = $conn->query($sql);

	$passhash;
		
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$passhash = $row["password"];
		}
	} else {
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";
		header('Refresh: 5; URL=login.html');
		exit;
	}
		
	//echo $passhash.'<br/>';
		
	$passhash = substr( $passhash, 0, 60 );
		
	if(password_verify($password, $passhash)){
		echo 'Valid';
		
		session_start();
		$_SESSION['username'] = $username;
		header('Location: orderform.php');
		
		
		//echo "<script> location.href='orderform.html'; </script>";
	}
	else{
		//echo 'Invalid';
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";
		header('Refresh: 5; URL=login.html');
		exit;
	}
		
	if ($i != count($user_array) - 1){
		echo "\n";
	}
	
	$result->close();
		
	$conn->close();
	
	}
	
	echo $user;
	echo $passwd;
	
?>