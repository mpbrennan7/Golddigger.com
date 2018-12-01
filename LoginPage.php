<?php
  //session_start();
  // create short variable names
  $email = $_POST['email'];
  $password = $_POST['password'];
  $_SESSION['email'] = $email;
?>
<html>
<head>
  <title>Gold Digger</title>
  <link rel="stylesheet" href="PageStyles.css">
</head>
<body>
<h1>Gold Digger</h1>
<?php

	class USER{
	    public $email = "";
        public $password = "";
	
	function __construct($email, $password){
		$this->email = $email;
		$this->password = $password;
	}
	}

	$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";
	$dbuser = "root";
	$dbpass = "password";
	$db = "golddigger";
	
	$user = '';
	$passwd = "";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	$sql = "SELECT * FROM Users WHERE name='$email' AND password='$password'";
	
	$user_array = array();
	 
    // if($result = $query->get_result()){
	if($result = $conn->query($sql)){

	while($obj = $result->fetch_object()){
		$temp_user = new USER($obj->email, $obj->password);
		$user_array[] = $temp_user;
	}
  
	$output;

	for($i = 0; $i < count($user_array); $i++){
		$output = $user_array[$i];

	};
	
	
	$options = ['cost' => 7];
		$phash = password_hash('test', PASSWORD_BCRYPT, $options)."\n";
		
		
	$sql = "SELECT password FROM Users WHERE user='$email'";
	$result = $conn->query($sql);

	$passhash;
		
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$passhash = $row["password"];
		}
	} else {
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";
		//header('Refresh: 5; URL=login.html');
		//exit;
	}
		
	//echo $passhash.'<br/>';
		
	$passhash = substr( $passhash, 0, 60 );
		
	if(password_verify($password, $passhash)){
		echo 'Valid';
		
		session_start();
		$_SESSION['email'] = $email;
		//header('Location: orderform.php');
		
		
		//echo "<script> location.href='orderform.html'; </script>";
	}
	else{
		//echo 'Invalid';
		echo "<p>The account and password credentials do not match!  Returning back to login screen in 5 seconds.</p>";
		//header('Refresh: 5; URL=login.html');
		//exit;
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