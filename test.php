<?php

//require_once("CIS_474/Golddigger.com/class_structure.php");

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once("$root/CIS_474/Golddigger.com/class_structure.php");

$email = 'email';

$dbhost = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";//cloud DB host
$dbuser = "root";//DB user
$dbpass = "password";//DB password
$db = "golddigger";//DB name

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);//attempt a connection to the DB and print error on fail
//echo "here";
$allinfo = "SELECT * FROM Users WHERE name='test'";//Selecting password from the user table
		//$allresult = $conn->query($allinfo);//get result
		
		$curruserarray = array();//make a user array for holding user objects
	 //echo $conn->query($allinfo);
		if($currresult = $conn->query($allinfo)){//obtain the result

			$curr_user;

			while($currobj = $currresult->fetch_object()){
				//echo "here";
				$curr_user = new User($currobj->name, $currobj->pword, $currobj->age, $currobj->email, $currobj->zip, $currobj->income, $currobj->phoneNum, $currobj->type, $currobj->hairColor, $currobj->eyeColor, $currobj->height, $currobj->catOrDog, $currobj->religious, $currobj->cook, $currobj->beachOrSki, $currobj->introvertOrExtrovert, $currobj->genre, $currobj->relationshipStatus, $currobj->aboutYourself, $currobj->horoscope, $currobj->lookingFor, $currobj->favoriteCereal, $currobj->shoeSize);//make new user objects
				//$curruserarray[] = $temp_user;//assign the array to the user object
				//echo $currobj->name;
			}
			
			//$gName = Closure::bind($gName, null, $curr_user);

			//var_dump($gname($curr_user));
			//$hold = "This is hold";
			//echo $hold;
			echo $curr_user->getName();
			//echo $hold;
			print $curr_user->getAge();
		}

?>