<?php
  //session_start();
  // create short variable names
  $email = $_POST['email'];//get POST variable and store it in a short variable name
  $password = $_POST['password'];//get POST variable and store it in a short variable name
  //$_SESSION['email'] = $email;//SESSION Variable for email
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
		
		$allinfo = "SELECT * FROM Users WHERE user='$email'";//Selecting password from the user table
		//$allresult = $conn->query($allinfo);//get result
		
		$curruserarray = array();//make a user array for holding user objects
	 
		if($currresult = $conn->query($allinfo)){//obtain the result

		$curr_user;
		
		while($currobj = $currresult->fetch_object()){
			$curr_user = new User($currobj->name, $currobj->password, $currobj->email, $currobj->zip);//make new user objects
			$curruserarray[] = $temp_user;//assign the array to the user object
		}
		
		  function __construct($nm,$p,$a,$e,$z,$i,$pn,$t,$nc,$hc,$ec,$h,$cod,$r,$c,$bos,$ioe,$g,$rs,$ay,$hor,$lf,$fc,$ss){
	$name = $nm;
	$pword = $p;
	$age = $a;
	$email = $e;
	$zip = $z;
	$income = $i;
	$phoneNum = $pn;
	$type = $t;
	$numCars = $nc;
	$hairColor = $hc;
	$eyeColor = $ec;
	$height = $h;
	$catOrDog = $cod;
	$religious = $r;
	$cook = $c;
	$beachOrSki = $bos;
	$introvertOrExtrovert = $ioe;
	$genre = $g;
	$relationshipStatus = $rs;
	$aboutYourself = $ay;
	$horoscope = $h;
	$lookingFor = $lf;
	$favoriteCereal = $fc;
	$shoeSize = $ss;
	$score = 0;
  }
		
		if ($allresult->num_rows > 0) {//check the result holds data
			// output data of each row
			while($allrow = $result->fetch_assoc()) {//loop through all row results
				$db_name = $allrow["name"];;
				$db_age = $allrow["age";
				$db_email = $allrow["email"];
				$db_zip = $allrow["zip"];
				$db_income = $allrow["income"];
				$db_phoneNum = $allrow["phoneNum"];
				$db_type = $allrow["type"];
				$db_numCars = $allrow["numCars"];
				$db_hairColor = $allrow["hairColor"];
				$db_eyeColor = $allrow["eyeColor"];
				$db_height = $allrow["height"];
				$db_catOrDog = $allrow["catOrDog"];
				$db_religious = $allrow["religious"];
				$db_ruralOrUrban = $allrow["ruralOrUrban"];
				$db_cook = $allrow["cook"];
				$db_beachOrSki = $allrow["beachOrSki"];
				$db_introvertOrExtrovert = $allrow["introvertOrExtrovert"];
				$db_genre = $allrow["genre"];
				$db_relationshipStatus = $allrow["relationshipStatus"];
				$db_aboutYourself = $allrow["aboutYourself"];
				$db_horoscope = $allrow["horoscope"];
				$db_lookingFor = $allrow["lookingFor"];
				$db_favorite_Cereal = $allrow["favoriteCereal"];
				$db_shoeSize = $allrow["shoeSize"];
			}
		} 
		
		
		
		echo 'Valid';//tell user password is valid
		require('class_structure.php');
		session_start();//begin a PHP session_cache_expire
		$_SESSION['email'] = $db_name;//hold email in the PHP SESSION
		$_SESSION['age'] = $db_age;
		$_SESSION['email'] = $db_email;
		$_SESSION['zip'] = $db_zip;
		$_SESSION['income'] = $db_income;
		$_SESSION['phoneNum'] = $db_phoneNum;
		$_SESSION['type'] = $db_type;
		$_SESSION['numCars'] = $db_numCars;
		$_SESSION['hairColor'] = $db_hairColor;
		$_SESSION['eyeColor'] = $db_eyeColor;
		$_SESSION['height'] = $db_height;
		$_SESSION['catOrDog'] = $db_catOrDog;
		$_SESSION['re
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