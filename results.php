<?php
require ('class_structure.php');
session_start();

#need some sort of session data/current account data

	$server = "golddigger.cl5oeek4fomj.us-east-2.rds.amazonaws.com";
	$username = "username";
	$password = "password";
	$dbname = "golddigger";
	$port = 3306;


$con=mysqli_connect($server,$username,$password,$dbname,$port);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM users";
$result=mysqli_query($con,$sql);

// Fetch all
mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
//mysqli_free_result($result);
//Variables for the results and algorithm
$email=$_SESSION['email'];
$sql="SELECT * FROM users WHERE email='$email'";
$name;
$pword;
$age;
$income;
$phoneNum;
$type;
$zip;
$catOrDog;
$hairColor;
$eyeColor;
$height;
$religious;
$ruralOrUrban;
$cook;
$beachOrSki;
$introvertOrExtrovert;
$genre;
$relationShipStatus;
$aboutYourself;
$horoscope;
$lookingFor;
$favoriteCereal;
$shoeSize;



//gets user information
//Takes stuff from sql query and assigns them to a variable 

foreach ($result as $row) {
	// These need to be attribute names from the table case sensitive 
	
	$email=$row['email'];
	$name=$row['name'];
	$pword=$row['pword'];
	$age=$row['age'];
	$income=$row['income'];
	$phoneNum=$row['phoneNum'];
	$type=$row['type'];
	$sql=$row['users'];
	$zip=$row['zip'];
	$catOrDog=$row['catOrDog'];
	$hairColor=$row['hairColor'];
	$eyeColor=$row['eyeColor'];
	$height=$row['height'];
	$religious=$row['religious'];
	$ruralOrUrban=$row['ruralOrUrban'];
	$cook=$row['cook'];
	$beachOrSki=$row['beachOrSki'];
	$introvertOrExtrovert=$row['introvertOrExtrovert'];
	$genre=$row['genre'];
	$relationShipStatus=$row['relationShipStatus'];
	$aboutYourself=$row['aboutYourself'];
	$horoscope=$row['horoscope'];
	$lookingFor=$row['lookingFor'];
	$favoriteCereal=$row['favoriteCereal'];
	$shoeSize=$row['shoeSize'];
	
	if($host_location[$i] ==$location){
		$score = $score + 10000;
	}
	if(!($host_req_english[$i] == 0 || $req_english == 1)){
		$score = $score + 200;
	}
	else {
		if($host_second_language[$i] == $second_language){
			$score = $score + 100;
		}
	}
	if($host_purpose[$i] == $purpose){
		$score = $score + 500;
	}
	if($host_rent[$i]==$rent){
		$score = $score + 200;
	}
	
	
	
	if($score > $top1score){
		$top3score = $top2score;
		$top3email = $top2email;
		$top2score = $top1score;
		$top2email = $top1email;
		$top1score = $score;
		$top1email = $host_email[$i];
	}
	else if($score > $top2score){
		$top3score = $top2score;
		$top3email = $top2email;
		$top2score = $score;
		$top2email = $host_email[$i];
	}
	else if($score > $top3score){
		$top3score = $score;
		$top3email = $host_email[$i];
	}
	
	$i = $i + 1;
	



	
	
	$sql="SELECT * FROM hosts WHERE email= '$top1email'";
	$result3=$con->query($sql);
	if($result3->num_rows > 0){
		while($row = $result3->fetch_assoc()){
			$location1 = $row['location'];
			$fname1 = $row['fname'];
			$lname1 = $row['lname'];
		}
	}
	
	$sql="SELECT * FROM hosts WHERE email= '$top2email'";
	$result4=$con->query($sql);
	if($result4->num_rows > 0){
		while($row = $result4->fetch_assoc()){
			$location2 = $row['location'];
			$fname2 = $row['fname'];
			$lname2 = $row['lname'];
		}
	}
	
	$sql="SELECT * FROM hosts WHERE email= '$top3email'";
	$result5=$con->query($sql);
	if($result5->num_rows > 0){
		while($row = $result5->fetch_assoc()){
			$location3 = $row['location'];
			$fname3 = $row['fname'];
			$lname3 = $row['lname'];
		}
	}
	
	
	
}

	echo "<div class=\"header\">Recommended Connections: </div>
		<div class=\"row\">
			<div class=\"column\">
				<div class=\"card\">
				  <img src=\"img/images1.jpeg\" alt=\"John\" style=\"width:100%\">
				  <h1>$fname1 $lname1</h1>
				  <p class=\"title\">$top1score</p>
				  <p>$location1</p>
				  <p><button onclick=alert(\"$top1email\")>Contact</button></p>
				</div>
			</div>
			<div class=\"column\">
				<div class=\"card\">
				  <img src=\"img/images2.jpeg\" alt=\"John\" style=\"width:100%\">
				  <h1>$fname2 $lname2</h1>
				  <p class=\"title\">$top2score</p>
				  <p>$location2</p>
				  <p><button onclick=alert(\"$top2email\")>Contact</button></p>
				</div>
			</div>
			<div class=\"column\">
				<div class=\"card\">
				  <img src=\"img/images3.jpeg\" alt=\"John\" style=\"width:100%\">
				  <h1>$fname3 $lname3</h1>
				  <p class=\"title\">$top3score</p>
				  <p>$location3</p>
				  <p><button onclick=alert(\"$top3email\")>Contact</button></p>
				</div>
			</div>
		</div>";
		
	mysqli_close($con);
?>


<!-- Add icon library -->
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
<!--<div class="header">Results for <?php echo "'$username'" ?> </div>
		<div class="row">
			<div class="column">
				<div class="card">
				  <img src="img/family1.jpg" alt="John" style="width:100%">
				  <h1>"<?php echo $fname1.$lname1; ?>"</h1>
				  <p class="title"><?php echo "'$top1score'"; ?></p>
				  <p><?php echo "'$location1'"; ?></p>
				  <p><button>Contact</button></p>
				</div>
			</div>
			<div class="column">
				<div class="card">
				  <img src="img/images1.jpg" alt="John" style="width:100%">
				  <h1><?php echo "$fname2 $lname2"; ?></h1>
				  <p class="title"><?php echo "'$top2score'"; ?></p>
				  <p><?php echo "'$location2'" ?></p>
				  <p><button>Contact</button></p>
				</div>
			</div>
			<div class="column">
				<div class="card">
				  <img src="img/darthvadar.jpg" alt="John" style="width:100%">
				  <h1><?php echo "'$fname3'.'$lname3'" ?></h1>
				  <p class="title"><?php echo $top3score ?></p>
				  <p><?php echo $location3 ?></p>
				  <p><button>Contact</button></p>
				</div>
			</div>
		</div>-->

</html>
<style>
.card {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	max-width: 300px;
	margin: auto;
	text-align: center;
	border-radius: 10%;
	background-color: white;
}
.header{
  color: black;
	font-family: Ubuntu;
	font-size: 5em;
	text-align: center;
}

.title {
	color: grey;
	font-size: 18px;
}

button {
	border: none;
	outline: 0;
	display: inline-block;
	padding: 8px;
	color: white;
	background-color: #000;
	text-align: center;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
}

a {
	text-decoration: none;
	font-size: 22px;
	color: black;
}

button:hover, a:hover {
	opacity: 0.7;
}
.row::after {
  content: "";
  clear: both;
  display: table;
}
.column {
  float: left;
  width: 22%;
  padding: 5.5%;
  margin-top: 5%;
}
body {
	background-color: #343A40;
	background-image: url('https://images.unsplash.com/photo-1507418828307-8e909173e254?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=910581fbea7336f623a0a22bb0410cdc&auto=format&fit=crop&w=1052&q=80');
	background-size: 100% 100%;

}
img {
	border-radius: 50%;
}
</style>
