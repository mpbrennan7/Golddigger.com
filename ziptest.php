<?php
$apikey = "se4wSwtmJV8JCvLWIhLPvKjUlgdRDhifDdwHOJKuu7JQ0MZkPzIZlNkFN4x19IUM";
$format = "json";
$zip1 = 63366;
$zip2 = 63105;

$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
//echo $url;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
//echo $result;


$decode = json_decode($result, true);
//$test = (string)$decode;
//echo $test;
//$distance = $decode->{'distance'}->;
//echo $distance;

//echo $decode;

//echo "Distance:".$decode["distance"];

//echo "\n\n\n\n\n";

$distvar = $decode["distance"];
echo "Distance:".$distvar;
//echo $distvar;

?>