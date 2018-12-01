<?php

require('class_structure.php');
//include PATH_TO_CLASS . 'class-Structure.php'
session_start();
$ss_curr_user = $_SESSION['curr_user'];

echo $ss_curr_user->getName();
echo "<br/>";
echo $ss_curr_user->getPword();
echo "<br/>";
echo $ss_curr_user->getAge();
echo "<br/>";
echo $ss_curr_user->getEmail();
echo "<br/>";
echo $ss_curr_user->getZip();
echo "<br/>";
echo $ss_curr_user->getIncome();
echo "<br/>";
echo $ss_curr_user->getPhoneNum();
echo "<br/>";
echo $ss_curr_user->getType_();
echo "<br/>";
echo $ss_curr_user->getHairColor();
echo "<br/>";
echo $ss_curr_user->getEyeColor();
echo "<br/>";
echo $ss_curr_user->getHeight();
echo "<br/>";
echo $ss_curr_user->getCatOrDog();
echo "<br/>";
echo $ss_curr_user->getReligious();
echo "<br/>";
echo $ss_curr_user->getCook();
echo "<br/>";
echo $ss_curr_user->getBeachOrSki();
echo "<br/>";
echo $ss_curr_user->getIntrovertOrExtrovert();
echo "<br/>";
echo $ss_curr_user->getGenre();
echo "<br/>";
echo $ss_curr_user->getRelationshipStatus();
echo "<br/>";
echo $ss_curr_user->getAboutYourself();
echo "<br/>";
echo $ss_curr_user->getHoroscope();
echo "<br/>";
echo $ss_curr_user->getLookingFor();
echo "<br/>";
echo $ss_curr_user->getFavoriteCereal();
echo "<br/>";
echo $ss_curr_user->getShoeSize();


#need some sort of session data/current account data

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
$sql="SELECT * FROM Users";


 
$result=mysqli_query($con,$sql);

// Fetch all
mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
//mysqli_free_result($result);
//Variables for the results and algorithm
//$current_user = $_SESSION['FIX_THIS_LATER'];//fix this

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
$relationshipStatus;
$aboutYourself;
$horoscope;
$lookingFor;
$favoriteCereal;
$shoeSize;
$SugarDaddyArray = array();
$CougarArray = array();
$GoldDiggerFemaleArray = array();
$GoldDiggerMaleArray = array();

$i= 0;
//gets user information
//Takes stuff from sql query and assigns them to a variable 
if($result ->num_rows >0){
	
	foreach ($result as $row) {
		// These need to be attribute names from the table case sensitive 
		
		$email=$row['email'];
		$name=$row['name'];
		$pword=$row['pword'];
		$age=$row['age'];
		$income=$row['income'];
		$phoneNum=$row['phoneNum'];
		$type=$row['type'];
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
		$relationshipStatus=$row['relationshipStatus'];
		$aboutYourself=$row['aboutYourself'];
		$horoscope=$row['horoscope'];
		$lookingFor=$row['lookingFor'];
		$favoriteCereal=$row['favoriteCereal'];
		$shoeSize=$row['shoeSize'];
		//Create object
		$user;
		if ($type == "SugarDaddy") {
			$SugarDaddyArray[$i] = new SugarDaddy($name,$pword,$age,$email,$zip,$income,$phoneNum,$type,$hairColor,$eyeColor,$height,$catOrDog,$religious,$cook,$beachOrSki,
						$introvertOrExtrovert,$genre,$relationshipStatus,$aboutYourself,$horoscope,$lookingFor,$favoriteCereal,$shoeSize);
			
		}
		else if ($type == "Cougar") {
			$CougarArray[$i] = new Cougar($name,$pword,$age,$email,$zip,$income,$phoneNum,$type,$hairColor,$eyeColor,$height,$catOrDog,$religious,$cook,$beachOrSki,
						$introvertOrExtrovert,$genre,$relationshipStatus,$aboutYourself,$horoscope,$lookingFor,$favoriteCereal,$shoeSize);
		}
		else if ($type=="GoldDiggerMale") {
			$GoldDiggerMaleArray[$i] = new GoldDiggerM($name,$pword,$age,$email,$zip,$income,$phoneNum,$type,$hairColor,$eyeColor,$height,$catOrDog,$religious,$cook,$beachOrSki,
						$introvertOrExtrovert,$genre,$relationshipStatus,$aboutYourself,$horoscope,$lookingFor,$favoriteCereal,$shoeSize);
		}
		else if ($type=="GoldDiggerFemale") {
			$GoldDiggerFemaleArray[$i] = new GoldDiggerF($name,$pword,$age,$email,$zip,$income,$phoneNum,$type,$hairColor,$eyeColor,$height,$catOrDog,$religious,$cook,$beachOrSki,
						$introvertOrExtrovert,$genre,$relationshipStatus,$aboutYourself,$horoscope,$lookingFor,$favoriteCereal,$shoeSize);
		}
		//Save the user to the array
		
		
		//Counter
		$i = $i + 1;
		
		
		
	}
	
}
/*foreach($SugarDaddyArray as $daddy){
	echo $daddy -> getName();
}	
foreach($GoldDiggerMaleArray as $gdm){
	echo $gdm -> getName();
}
*/

if($ss_curr_user->getType_() == "SugarDaddy"){
	foreach($GoldDiggerFemaleArray as $thot) {
		if ($ss_curr_user->getAge()-$thot->getAge()>30){
			$thot->setScore($thot->getScore()+50)
		}
		else if ($ss_curr_user->getAge()-$thot->getAge()>=20 && $ss_curr_user->getAge()-$thot->getAge()<=30){
			$thot->setScore($thot->getScore()+10)
		}
		
	}
}
else if($ss_curr_user->getType_() == "Cougar"){
	
	
}
else if($ss_curr_user->getType_() == "GoldDiggerFemale"){
	
}
else if(echo $ss_curr_user->getType_() == "GoldDiggerMale"){
	
}


	
	

/*
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
		*/
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
