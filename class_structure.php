<?php
class User {
  // The parent’s class code
  //private variables from the database
  private $name;
  private $pword;
  private $age;
  private $email;
  private $zip;
  private $income;
  private $phoneNum;
  private $type;
  private $numCars;
  private $hairColor;
  private $eyeColor;
  private $height;
  private $catOrDog;
  private $religious;
  private $ruralOrUrban;
  private $cook;
  private $beachOrSki;
  private $introvertOrExtrovert;
  private $genre;
  private $relationshipStatus;
  private $aboutYourself;
  private $horoscope;
  private $lookingFor;
  private $favoriteCereal;
  private $shoeSize;
  private $score;
  
  
 
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
  
  public function getName(){
	  return $name;
  }
  public function getPword(){
	  return  $pword;
  }
  public function getAge(){
	  return  $age;
  }
  public function getEmail(){
	  return  $email;
  }
  public function getZip(){
	  return  $zip;
  }
  public function getIncome(){
	  return  $income;
  }
  public function getPhoneNum(){
	  return  $phoneNum;
  }
  public function getType_(){
	  return  $type;
  }
  public function getNumCars(){
	  return  $numCars;
  }
  public function getHairColor(){
	  return  $hairColor;
  }
  public function getEyeColor(){
	  return  $eyeColor;
  }
  public function getHeight(){
	  return  $height;
  }
  public function getCatOrDog(){
	  return  $catOrDog;
  }
  public function getReligious(){
	  return  $religious;
  }
  public function getCook(){
	  return  $cook;
  }  
  public function getBeachOrSki(){
	  return  $beachOrSki;
  }
  public function getIntrovertOrExtrovert(){
	  return  $introvertOrExtrovert;
  }
  public function getGenre(){
	  return  $genre;
  }
  public function getRelationshipStatus(){
	  return  $relationshipStatus;
  }
  public function getAboutYourself(){
	  return  $aboutYourself;
  }
  public function getHoroscope(){
	  return  $horoscope;
  }
  public function getLookingFor(){
	  return  $lookingFor;
  }
  public function getFavoriteCereal(){
	  return  $favoriteCereal;
  }
  public function getShoeSize(){
	  return  $shoeSize;
  }
  public function getScore(){
	  return  $score;
  }
  public function setScore($scr){
	  $score = $scr;
  }
  
}

 
class Cougar extends User {
  // The  child can use the parent's class code
  
}

class SugarDaddy extends User {
  // The  child can use the parent's class code
  
}

class GolddiggerM extends User {
  // The  child can use the parent's class code
  
}

class GolddiggerF extends User {
  // The  child can use the parent's class code
  
}
?>