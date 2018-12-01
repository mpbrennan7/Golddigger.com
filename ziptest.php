<?php
$apikey = "se4wSwtmJV8JCvLWIhLPvKjUlgdRDhifDdwHOJKuu7JQ0MZkPzIZlNkFN4x19IUM";
$format = "json";
$zip1 = 63123;
$zip2 = 63109;

$url = "https://www.zipcodeapi.com/rest/".$apikey."/distance.json/".$zip1."/".$zip2."/miles";
//echo $url;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
echo $result;


$decode = var_dump(json_decode($result));
$test = (string)$decode;
echo $test;
$distance = $decode->{'distance'}->;
echo $distance;


?>