<html> <!-- Create HTML Document -->
<head> <!-- HTML Head -->
  <title>Results</title> <!-- Title of Web page -->
  <!--<link rel="stylesheet" href="PageStyles.css"> <!-- Bring in stylesheet -->
</head> <!-- Close HTML Head -->

<?php

require('class_structure.php');
//include PATH_TO_CLASS . 'class-Structure.php'
session_start();
$ss_curr_user = $_SESSION['curr_user'];
$index = $_SESSION['index'];
/*
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
*/

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

$apikey = "iF3M7s7kbXdGF2v3LGq6DpJ97fKXWlSKBdUtIzEs0333Ph1NY3AS6EKEcADCNqMq";
$zip1 = $ss_curr_user->getZip();

if($ss_curr_user->getType_() == "SugarDaddy"){
	foreach($GoldDiggerFemaleArray as $thot) {
		$zip2 = $thot->getZip();
		$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		$decode = json_decode($result, true);
		$distvar = $decode["distance"];
		//echo $distvar;//for testing
		if($distvar <= 20){
			$thot->setScore($thot->getScore()+800);
		}
		else if($distvar >20 && $distvar <= 100){
			$thot->setScore($thot->getScore()+600);
		}
		//Compares the age of the GoldDiggerFemale to the SugarDaddy
		if ($ss_curr_user->getAge()-$thot->getAge()>30){
			$thot->setScore($thot->getScore()+50);
		}
		else if ($ss_curr_user->getAge()-$thot->getAge()>=20 && $ss_curr_user->getAge()-$thot->getAge()<=30){
			$thot->setScore($thot->getScore()+10);

		}
		//Assigns points based on the income of GoldDiggerFemale
		if ($thot->getIncome() ==0) {
			$thot->setScore($thot->getScore()+50);
		}
		else if ($thot->getIncome() ==1) {
			$thot->setScore($thot->getScore()+30);
		}
		else if ($thot->getIncome() ==2) {
			$thot->setScore($thot->getScore()+10);
		}
		else if ($thot->getIncome() ==3) {
			$thot->setScore($thot->getScore()+0);
		}
		//Assign points based on Gold Digger Female being a cat or dog person
		if ($thot->getCatOrDog() == $ss_curr_user->getCatOrDog()) {
			$thot->setScore($thot->getScore()+50);
		}
		else if ($thot->getCatOrDog() != $ss_curr_user->getCatOrDog()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on hair color 
		if ($thot->getHairColor()== "Blond"){
			$thot->setScore($thot->getScore()+50);
		}
		else if ($thot->getHairColor()=="Brown") {
			$thot->setScore($thot->getScore()+40);
		}
		else if ($thot->getHairColor()=="Red") {
			$thot->setScore($thot->getScore()+30);
		}
		else if ($thot->getHairColor()=="Black") {
			$thot->setScore($thot->getScore()+20);
		}
		else if ($thot->getHairColor()=="White") {
			$thot->setScore($thot->getScore()-50);
		}
		//Assign points based on Eye Color 
		if ($thot->getEyeColor()=="Blue") {
			$thot->setScore($thot->getScore()+50);
		}
		else if ($thot->getEyeColor()=="Hazel") {
			$thot->setScore($thot->getScore()+30);
		}
		else if ($thot->getEyeColor()=="Green") {
			$thot->setScore($thot->getScore()+20);
		}
		else if ($thot->getEyeColor()=="Brown") {
			$thot->setScore($thot->getScore()+10);
		}
		else if ($thot->getEyeColor()=="Red") {
			$thot->setScore($thot->getScore()-20);
		}
		//Assign points based on height
		//If the Gold Digger Female is greater than 2 feet shorter than the Sugar Daddy
		if ($ss_curr_user->getHeight() - $thot->getHeight() >=24) {
			$thot->setScore($thot->getScore()+0);
		}
		///If the Gold Digger Female is greater than 1.5 and less than 2 feet shorter than the Sugar Daddy
		else if ($ss_curr_user->getHeight() - $thot->getHeight() < 24 && $ss_curr_user->getHeight() - $thot->getHeight() >= 18) {
			$thot->setScore($thot->getScore()+10);
		}
		///If the Gold Digger Female is greater than 1 and less than 1.5 feet shorter than the Sugar Daddy
		else if ($ss_curr_user->getHeight() - $thot->getHeight() < 18 && $ss_curr_user->getHeight() - $thot->getHeight() > 12) {
			$thot->setScore($thot->getScore()+30);
		}
		///If the Gold Digger Female is greater than .5 and less than 1 feet shorter than the Sugar Daddy
		else if ($ss_curr_user->getHeight() - $thot->getHeight() < 12 && $ss_curr_user->getHeight() - $thot->getHeight() > 6) {
			$thot->setScore($thot->getScore()+50);
		}
		///If the Gold Digger Female is greater than 0 and less than .5 feet shorter than the Sugar Daddy
		else if ($ss_curr_user->getHeight() - $thot->getHeight() < 6 && $ss_curr_user->getHeight() - $thot->getHeight() > 0) {
			$thot->setScore($thot->getScore()+40);
		}
		///If the Gold Digger Female is less than 0 feet taller than the Sugar Daddy
		else if ($ss_curr_user->getHeight() - $thot->getHeight() < 0) {
			$thot->setScore($thot->getScore()-50);
		}
		//Assign points based on religious
		if ($ss_curr_user->getReligious() == $thot->getReligious()) {
			$thot->setScore($thot->getScore()+50);
		}
		
		//Assign points based on Rural or Urban 
		if($ss_curr_user->getRuralOrUrban() == $thot->getRuralOrUrban()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on cook
		if($ss_curr_user->getCook() == $thot->getCook()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on Beach or Ski
		if($ss_curr_user->getBeachOrSki() == $thot->getBeachOrSki()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on Introvert or extrovert
		if ($thot->getIntrovertOrExtrovert() == 1) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on Genre of music likes
		if($ss_curr_user->getGenre() == $thot->getGenre()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on Relationship status 
		if($ss_curr_user->getRelationshipStatus() == $thot->getRelationshipStatus()) {
			$thot->setScore($thot->getScore()+20);
		}
		else if ($thot->getRelationshipStatus() == "single") {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on Horoscope
		if($ss_curr_user->getHoroscope() == $thot->getHoroscope()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on favorite cereal 
		if($ss_curr_user->getFavoriteCereal() == $thot->getFavoriteCereal()) {
			$thot->setScore($thot->getScore()+50);
		}
		//Assign points based on shoe size 
		if($thot->getShoeSize() < 10) {
			$thot->setScore($thot->getScore()+50);
		}
		
	}
}



else if($ss_curr_user->getType_() == "Cougar"){
	foreach($GoldDiggerMaleArray as $golddigger) {
		$zip2 = $golddigger->getZip();
		$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		$decode = json_decode($result, true);
		$distvar = $decode["distance"];
		//echo $distvar;//for testing
		if($distvar <= 20){
			$golddigger->setScore($golddigger->getScore()+800);
		}
		else if($distvar >20 && $distvar <= 100){
			$golddigger->setScore($golddigger->getScore()+600);
		}
		//Compares the age of the GoldDiggerFemale to the SugarDaddy
		if ($ss_curr_user->getAge()-$golddigger->getAge()>30){
			$golddigger->setScore($golddigger->getScore()+50);
		}
		else if ($ss_curr_user->getAge()-$golddigger->getAge()>=20 && $ss_curr_user->getAge()-$golddigger->getAge()<=30){
			$golddigger->setScore($golddigger->getScore()+10);

		}
		//Assigns points based on the income of GoldDiggerMale
		if ($golddigger->getIncome() ==0) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		else if ($golddigger->getIncome() ==1) {
			$golddigger->setScore($golddigger->getScore()+30);
		}
		else if ($golddigger->getIncome() ==2) {
			$golddigger->setScore($golddigger->getScore()+10);
		}
		else if ($golddigger->getIncome() ==3) {
			$golddigger->setScore($golddigger->getScore()+0);
		}
		//Assign points based on Gold Digger Male being a cat or dog person
		if ($golddigger->getCatOrDog() == $ss_curr_user->getCatOrDog()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on hair color 
		if ($golddigger->getHairColor== "Blond"){
			$golddigger->setScore($golddigger->getScore()+50);
		}
		else if ($golddigger->getHairColor()=="Brown") {
			$golddigger->setScore($golddigger->getScore()+40);
		}
		else if ($golddigger->getHairColor()=="Red") {
			$golddigger->setScore($golddigger->getScore()+30);
		}
		else if ($golddigger->getHairColor()=="Black") {
			$golddigger->setScore($golddigger->getScore()+20);
		}
		else if ($golddigger->getHairColor()=="White") {
			$golddigger->setScore($golddigger->getScore()-50);
		}
		//Assign points based on Eye Color 
		if ($golddigger->getEyeColor()=="Brown") {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		else if ($golddigger->getEyeColor()=="Hazel") {
			$golddigger->setScore($golddigger->getScore()+30);
		}
		else if ($golddigger->getEyeColor()=="Green") {
			$golddigger->setScore($golddigger->getScore()+20);
		}
		else if ($golddigger->getEyeColor()=="Blue") {
			$golddigger->setScore($golddigger->getScore()+10);
		}
		else if ($golddigger->getEyeColor()=="Red") {
			$golddigger->setScore($golddigger->getScore()-20);
		}
		//Assign points based on height
		//If the Gold digger male  is greater than 2 feet taller than the Cougar
		if ($golddigger->getHeight() - $ss_curr_user->getHeight() >=24) {
			$golddigger->setScore($golddigger->getScore()+0);
		}
		///If the Gold Digger male is greater than 1.5 and less than 2 feet taller than the Cougar
		else if ($golddigger->getHeight() - $ss_curr_user->getHeight()  < 24 && $golddigger->getHeight() - $ss_curr_user->getHeight() >= 18) {
			$golddigger->setScore($golddigger->getScore()+10);
		}
		///If the Gold Digger male is greater than 1 and less than 1.5 feet taller than the Cougar
		else if ($golddigger->getHeight() - $ss_curr_user->getHeight()  < 18 && $golddigger->getHeight() -  $ss_curr_user->getHeight()  > 12) {
			$golddigger->setScore($golddigger->getScore()+30);
		}
		///If the Gold Digger male is greater than .5 and less than 1 feet taller than the Cougar
		else if ($golddigger->getHeight() - $ss_curr_user->getHeight()  < 12 &&$golddigger->getHeight() - $ss_curr_user->getHeight()  > 6) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		///If the Gold Digger male is greater than 0 and less than .5 feet taller than the Cougar
		else if ($golddigger->getHeight() - $ss_curr_user->getHeight()< 6 && $golddigger->getHeight() - $ss_curr_user->getHeight() > 0) {
			$golddigger->setScore($golddigger->getScore()+40);
		}
		///If the Gold Digger male is less than 0 feet taller than the Cougar
		else if ($golddigger->getHeight() - $ss_curr_user->getHeight() < 0) {
			$golddigger->setScore($golddigger->getScore()-50);
		}
		//Assign points based on religious
		if ($ss_curr_user->getReligious() == $golddigger->getReligious()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		
		//Assign points based on Rural or Urban 
		if($ss_curr_user->getRuralOrUrban() == $golddigger->getRuralOrUrban()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on cook
		if($ss_curr_user->getCook() == $golddigger->getCook()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on Beach or Ski
		if($ss_curr_user->getBeachOrSki() == $golddigger->getBeachOrSki()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on Introvert or extrovert
		if ($golddigger->getIntrovertOrExtrovert == 1) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on Genre of music likes
		if($ss_curr_user->getGenre() == $golddigger->getGenre()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on Relationship status 
		if($ss_curr_user->getRelationshipStatus() == $golddigger->getRelationshipStatus()) {
			$golddigger->setScore($golddigger->getScore()+20);
		}
		else if ($golddigger->getRelationshipStatus() == "single") {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on Horoscope
		if($ss_curr_user->getHoroscope() == $golddigger->getHoroscope()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on favorite cereal 
		if($ss_curr_user->getFavoriteCereal() == $golddigger->getFavoriteCereal()) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
		//Assign points based on shoe size 
		if($golddigger->getShoeSize() > 10) {
			$golddigger->setScore($golddigger->getScore()+50);
		}
	}
	
}
else if($ss_curr_user->getType_() == "GoldDiggerFemale"){
	foreach($SugarDaddyArray as $daddy) {
		$zip2 = $daddy->getZip();
		$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		$decode = json_decode($result, true);
		$distvar = $decode["distance"];
		//echo $distvar;//for testing
		if($distvar <= 20){
			$daddy->setScore($daddy->getScore()+800);
		}
		else if($distvar >20 && $distvar <= 100){
			$daddy->setScore($daddy->getScore()+600);
		}
		if ($ss_curr_user->getAge()-$daddy->getAge()< -30 ){
			$daddy->setScore($daddy->getScore()+50);
		}
		else if ($ss_curr_user->getAge()-$daddy->getAge()<=-20 && $ss_curr_user->getAge()-$daddy->getAge()>=-30){
			$daddy->setScore($daddy->getScore()+10);

		}
		//Assigns points based on the income of GoldDiggerFemale
		if ($daddy->getIncome() ==0) {
			$daddy->setScore($daddy->getScore()+0);
		}
		else if ($daddy->getIncome() ==1) {
			$daddy->setScore($daddy->getScore()+10);
		}
		else if ($daddy->getIncome() ==2) {
			$daddy->setScore($daddy->getScore()+30);
		}
		else if ($daddy->getIncome() ==3) {
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on Gold Digger Female being a cat or dog person
		if ($daddy->getCatOrDog() == $ss_curr_user->getCatOrDog()) {
			$daddy->setScore($daddy->getScore()+50);
		}
		else if ($daddy->getCatOrDog() != $ss_curr_user->getCatOrDog()) {
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on hair color 
		if ($daddy->getHairColor== "Black"){
			$daddy->setScore($daddy->getScore()+50);
		}
		else if ($daddy->getHairColor()=="Brown") {
			$daddy->setScore($daddy->getScore()+40);
		}
		else if ($daddy->getHairColor()=="Red") {
			$daddy->setScore($daddy->getScore()+30);
		}
		else if ($daddy->getHairColor()=="Blonde") {
			$daddy->setScore($daddy->getScore()+20);
		}
		else if ($daddy->getHairColor()=="White") {
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on Eye Color 
		if ($daddy->getEyeColor()=="Blue") {
			$daddy->setScore($daddy->getScore()+50);
		}
		else if ($daddy->getEyeColor()=="Hazel") {
			$daddy->setScore($daddy->getScore()+30);
		}
		else if ($daddy->getEyeColor()=="Green") {
			$daddy->setScore($daddy->getScore()+20);
		}
		else if ($daddy->getEyeColor()=="Brown") {
			$daddy->setScore($daddy->getScore()+10);
		}
		else if ($daddy->getEyeColor()=="Red") {
			$daddy->setScore($daddy->getScore()-20);
		}
		//Calculate height difference 
		$heightdiff = $daddy->getHeight() - $ss_curr_user->getHeight();
		//Assign points based on height difference
		if($heightdiff >= 12){
			$daddy->setScore($daddy->getScore()+30);
		}
		else if ($heightdiff > 0 && $heightdiff < 12){
			$daddy->setScore($daddy->getScore()+50);
		}
		else if ($heightdiff > -12 && $heightdiff <=0){
			$daddy->setScore($daddy->getScore()-30);
		}
		else{
			$daddy->setScore($daddy->getScore()-50);
		}
		//Assign points based on pet prefererance
		if($daddy->getCatOrDog() == $ss_curr_user->getCatOrDog()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on religion 
		if($daddy->getReligious() == $ss_curr_user->getReligious()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on Rural or Urban 
		if($daddy->getRuralOrUrban() == $ss_curr_user->getRuralOrUrban()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on whether they can cook or not 
		if($daddy->getCook() == $ss_curr_user->getReligious()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on vacation preferance 
		if($daddy->getBeachOrSki() == $ss_curr_user->getBeachOrSki()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based socail skills 
		if($daddy->getIntrovertOrExtrovert() == 1){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on genre of music 
		if($daddy->getGenre() == $ss_curr_user->getGenre()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points basd on religion 
		if($daddy->getReligious() == $ss_curr_user->getReligious()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points basd on relationship status 
		if($daddy->getRelationshipStatus() == "Single"){
			$daddy->setScore($daddy->getScore()+20);
		}
		if($daddy->getRelationshipStatus() == $ss_curr_user->getRelationshipStatus()){
			$daddy->setScore($daddy->getScore()+30);
		}
		//Assign points based on horoscope 
		if($daddy->getHoroscope() == $ss_curr_user->getHoroscope()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based favorite cereal 
		if($daddy-getFavoriteCereal() == $ss_curr_user->getFavoriteCereal()){
			$daddy->setScore($daddy->getScore()+50);
		}
		//Assign points based on shoe size 
		if($daddy-getShoeSize() < 10){
			$daddy->setScore($daddy->getScore()+50);
		}
	}
}
else if($ss_curr_user->getType_() == "GoldDiggerMale"){
	foreach($CougarArray as $coug) {
		$zip2 = $coug->getZip();
		$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		$decode = json_decode($result, true);
		$distvar = $decode["distance"];
		//echo $distvar;//for testing
		
		if($distvar <= 20){
			$coug->setScore($coug->getScore()+800);
		}
		else if($distvar >20 && $distvar <= 100){
			$coug->setScore($coug->getScore()+600);
		}
	
		if ($coug->getAge() - $ss_curr_user->getAge()>15){
			$coug->setScore($coug->getScore()+50);
		}
		else if ($ss_curr_user->getAge()-$coug->getAge()>=10 && $ss_curr_user->getAge()-$coug->getAge()<=15){
			$coug->setScore($coug->getScore()+10);

		}
		//Assigns points based on the income of GoldDiggerFemale
		if ($coug->getIncome() ==0) {
			$coug->setScore($coug->getScore()+0);
		}
		else if ($coug->getIncome() ==1) {
			$coug->setScore($coug->getScore()+10);
		}
		else if ($coug->getIncome() ==2) {
			$coug->setScore($coug->getScore()+30);
		}
		else if ($coug->getIncome() ==3) {
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on Gold Digger Female being a cat or dog person
		if ($coug->getCatOrDog() == $ss_curr_user->getCatOrDog()) {
			$coug->setScore($coug->getScore()+50);
		}
		else if ($coug->getCatOrDog() != $ss_curr_user->getCatOrDog()) {
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on hair color 
		if ($coug->getHairColor()== "Blond"){
			$coug->setScore($coug->getScore()+50);
		}
		else if ($coug->getHairColor()=="Brown") {
			$coug->setScore($coug->getScore()+40);
		}
		else if ($coug->getHairColor()=="Red") {
			$coug->setScore($coug->getScore()+30);
		}
		else if ($coug->getHairColor()=="Black") {
			$coug->setScore($coug->getScore()+20);
		}
		else if ($coug->getHairColor()=="White") {
			$coug->setScore($coug->getScore()-50);
		}
		//Assign points based on Eye Color 
		if ($coug->getEyeColor()=="Blue") {
			$coug->setScore($coug->getScore()+50);
		}
		else if ($coug->getEyeColor()=="Hazel") {
			$coug->setScore($coug->getScore()+30);
		}
		else if ($coug->getEyeColor()=="Green") {
			$coug->setScore($coug->getScore()+20);
		}
		else if ($coug->getEyeColor()=="Brown") {
			$coug->setScore($coug->getScore()+10);
		}
		else if ($coug->getEyeColor()=="Red") {
			$coug->setScore($coug->getScore()-20);
		}
		//Calculates height differance 
		$heightdiff = $coug->getHeight() - $ss_curr_user->getHeight();
		
		//Assign points based on height difference
		if($heightdiff >= 12){
			$coug->setScore($coug->getScore()-50);
		}
		else if ($heightdiff > 0 && $heightdiff < 12){
			$coug->setScore($coug->getScore()-30);
		}
		else if ($heightdiff > -12 && $heightdiff <=0){
			$coug->setScore($coug->getScore()+50);
		}
		else{
			$coug->setScore($coug->getScore()+10);
		}
		//Assign points based on Whether they are a cat or dog person
		if($coug->getCatOrDog() == $ss_curr_user->getCatOrDog()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on if they are religious 
		if($coug->getReligious() == $ss_curr_user->getReligious()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on if they are rural or urban 
		if($coug->getRuralOrUrban() == $ss_curr_user->getRuralOrUrban()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on if they can cook or not
		if($coug->getCook() == 1){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on preffered vacation
		if($coug->getBeachOrSki() == $ss_curr_user->getBeachOrSki()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on whether they are an introvert or extrovert
		if($coug->getIntrovertOrExtrovert() == 1){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on whether they like the same type of music 
		if($coug->getGenre() == $ss_curr_user->getGenre()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on whether they are religious or not 
		if($coug->getReligious() == $ss_curr_user->getReligious()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on relationship status 
		if($coug->getRelationshipStatus() == "Single"){
			$coug->setScore($coug->getScore()+20);
		}
		else if($coug->getRelationshipStatus() == $ss_curr_user->getRelationshipStatus()){
			$coug->setScore($coug->getScore()+30);
		}
		//Assign points based on horoscope
		if($coug->getHoroscope() == $ss_curr_user->getHoroscope()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on favorite cereal
		if($coug->getFavoriteCereal() == $ss_curr_user->getFavoriteCereal()){
			$coug->setScore($coug->getScore()+50);
		}
		//Assign points based on shoe size 
		if($coug->getShoeSize() < 10){
			$coug->setScore($coug->getScore()+50);
		}
	}	
}



function sort_objects($a, $b) {
	if($a->getScore() == $b->getScore()){ return 0 ; }
	return ($a->getScore() > $b->getScore()) ? -1 : 1;
}

usort($GoldDiggerFemaleArray, 'sort_objects');
  
echo "<div class=row>";
  
$maxindex = $index + 3;
$_SESSION['index'] = $maxindex;
$gdfindex = 0;
$gdmindex = 0;
$sdindex = 0;
$cindex = 0;


foreach ($GoldDiggerFemaleArray as $c){
	if($c->getScore() != 0 && $index < $maxindex && $dfindex == $index){
		echo "<div class=column>";
		echo "<textarea>Name: ".$c->getName()."</textarea>";
		echo "<textarea>Email: ".$c->getEmail()."</textarea>";
		echo "<textarea>Description: ".$c->getAboutYourself()."</textarea>";
		echo "<textarea>Score: ".$c->getScore()."</textarea>";
		echo "</div>";
		echo "<br/>";
		$index += 1;
	}
	$gdfindex += 1;	
}

usort($GoldDiggerMaleArray, 'sort_objects');

foreach ($GoldDiggerMaleArray as $c){
	if($c->getScore() != 0 && $index < $maxindex && $gdmindex == $index){
		echo "<div class=column>";
		echo "<textarea>Name: ".$c->getName()."</textarea>";
		echo "<textarea>Email: ".$c->getEmail()."</textarea>";
		echo "<textarea>Description: ".$c->getAboutYourself()."</textarea>";
		echo "<textarea>Score: ".$c->getScore()."</textarea>";
		echo "</div>";
		echo "<br/>";
		$index += 1;
	}
	$gdmindex += 1;
}

usort($SugarDaddyArray, 'sort_objects');

foreach ($SugarDaddyArray as $c){
	if($c->getScore() != 0 && $index < $maxindex && $sdindex == $index){
		echo "<div class=column>";
		echo "<textarea>Name: ".$c->getName()."</textarea>";
		echo "<textarea>Email: ".$c->getEmail()."</textarea>";
		echo "<textarea>Description: ".$c->getAboutYourself()."</textarea>";
		echo "<textarea>Score: ".$c->getScore()."</textarea>";
		echo "</div>";
		echo "<br/>";
		$index += 1;
	}
	$sdindex += 1;
}

usort($CougarArray, 'sort_objects');



foreach ($CougarArray as $c){

	if($c->getScore() != 0 && $index < $maxindex && $cindex == $index){
		echo "<div class=column id=outputmatch>";
		echo "<img src=profile.png>";
		echo "<textarea>Name: ".$c->getName()."</textarea>";
		echo "<textarea>Email: ".$c->getEmail()."</textarea>";
		echo "<textarea>Description: ".$c->getAboutYourself()."</textarea>";
		echo "<textarea>Score: ".$c->getScore()."</textarea>";
		echo "</div>";
		echo "<br/>";
		$index += 1;
	}
	$cindex += 1;
}

echo "</div>";

echo "<button value=Refresh Page onClick=window.location.reload()>Not Good Enough";
//echo "</table>";

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


a {
	text-decoration: none;
	font-size: 22px;
	color: black;
}

body {
	background-color: #343A40;
	background-image: url('https://images.unsplash.com/photo-1507418828307-8e909173e254?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=910581fbea7336f623a0a22bb0410cdc&auto=format&fit=crop&w=1052&q=80');
	background-size: 100% 100%;

}
img {
	border-radius: 50%;
	width:100px;
	height:100px;
}

textarea {
	font-family: Ubuntu;
    width: 20%;
    height: 75px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
	border: 1px solid black;
	font-size: 20px;
}

button{
    font-family: verdana;
	font-weight: bold;
    font-size: 26px;
		text-shadow:
        0.05em 0 white,
        0 0.05em white,
        -0.05em 0 white,
        0 -0.05em white;


</style>
