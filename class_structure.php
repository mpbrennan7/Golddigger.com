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
  
  
 
  function __construct($nm,$p,$a,$e,$z,$i,$pn,$t,$hc,$ec,$h,$cod,$r,$c,$bos,$ioe,$g,$rs,$ay,$hor,$lf,$fc,$ss){
	$this->name = $nm;
	$this->pword = $p;
	$this->age = $a;
	$this->email = $e;
	$this->zip = $z;
	$this->income = $i;
	$this->phoneNum = $pn;
	$this->type = $t;
	//$numCars = $nc;
	$this->hairColor = $hc;
	$this->eyeColor = $ec;
	$this->height = $h;
	$this->catOrDog = $cod;
	$this->religious = $r;
	$this->cook = $c;
	$this->beachOrSki = $bos;
	$this->introvertOrExtrovert = $ioe;
	$this->genre = $g;
	$this->relationshipStatus = $rs;
	$this->aboutYourself = $ay;
	$this->horoscope = $h;
	$this->lookingFor = $lf;
	$this->favoriteCereal = $fc;
	$this->shoeSize = $ss;
	$this->score = 0;
	
	//echo "HERE";
	
  }
  
  public function getName(){
	  return $this->name;
  }
  public function getPword(){
	  return  $this->pword;
  }
  public function getAge(){
	  return  $this->age;
  }
  public function getEmail(){
	  return  $this->email;
  }
  public function getZip(){
	  return  $this->zip;
  }
  public function getIncome(){
	  return  $this->income;
  }
  public function getPhoneNum(){
	  return  $this->phoneNum;
  }
  public function getType_(){
	  return  $this->type;
  }
  public function getNumCars(){
	  return  $this->numCars;
  }
  public function getHairColor(){
	  return  $this->hairColor;
  }
  public function getEyeColor(){
	  return  $this->eyeColor;
  }
  public function getHeight(){
	  return  $this->height;
  }
  public function getCatOrDog(){
	  return  $this->catOrDog;
  }
  public function getReligious(){
	  return  $this->religious;
  }
  public function getRuralOrUrban() {
	  return $this->ruralOrUrban;
  }
  public function getCook(){
	  return  $this->cook;
  }  
  public function getBeachOrSki(){
	  return  $this->beachOrSki;
  }
  public function getIntrovertOrExtrovert(){
	  return  $this->introvertOrExtrovert;
  }
  public function getGenre(){
	  return  $this->genre;
  }
  public function getRelationshipStatus(){
	  return  $this->relationshipStatus;
  }
  public function getAboutYourself(){
	  return  $this->aboutYourself;
  }
  public function getHoroscope(){
	  return  $this->horoscope;
  }
  public function getLookingFor(){
	  return  $this->lookingFor;
  }
  public function getFavoriteCereal(){
	  return  $this->favoriteCereal;
  }
  public function getShoeSize(){
	  return  $this->shoeSize;
  }
  public function getScore(){
	  return  $this->score;
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