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
	  return this -> $name;
  }
  public function getPword(){
	  return this -> $pword;
  }
  public function getAge(){
	  return this -> $age;
  }
  public function getEmail(){
	  return this -> $email;
  }
  public function getZip(){
	  return this -> $zip;
  }
  public function getIncome(){
	  return this -> $income;
  }
  public function getPhoneNum(){
	  return this -> $phoneNum;
  }
  public function getType_(){
	  return this -> $type;
  }
  public function getNumCars(){
	  return this -> $numCars;
  }
  public function getHairColor(){
	  return this -> $hairColor;
  }
  public function getEyeColor(){
	  return this -> $eyeColor;
  }
  public function getHeight(){
	  return this -> $height;
  }
  public function getCatOrDog(){
	  return this -> $catOrDog;
  }
  public function getReligious(){
	  return this -> $religious;
  }
  public function getCook(){
	  return this -> $cook;
  }  
  public function getBeachOrSki(){
	  return this -> $beachOrSki;
  }
  public function getIntrovertOrExtrovert(){
	  return this -> $introvertOrExtrovert;
  }
  public function getGenre(){
	  return this -> $genre;
  }
  public function getRelationshipStatus(){
	  return this -> $relationshipStatus;
  }
  public function getAboutYourself(){
	  return this -> $aboutYourself;
  }
  public function getHoroscope(){
	  return this -> $horoscope;
  }
  public function getLookingFor(){
	  return this -> $lookingFor;
  }
  public function getFavoriteCereal(){
	  return this -> $favoriteCereal;
  }
  public function getShoeSize(){
	  return this -> $shoeSize;
  }
  public function getScore(){
	  return this -> $score;
  }
  public function setScore($scr){
	  $score = $scr;
  
  
  
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