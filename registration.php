<?php



	$server = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";
	$username = "root";
	$password = "password";
	$dbname = "golddigger";
	$port = 3306;


$con=mysqli_connect($server,$username,$password,$dbname,$port);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 	try{
		error_reporting(0);
  $name = $_REQUEST['FullName'];
  $age = $_REQUEST['age'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $zip = $_REQUEST['zipcode'];
  $userType = $_REQUEST['UserType'];
  $income = $_REQUEST['Income'];
  
	}
	catch(Exception $e){
		
	}
  
 ?>