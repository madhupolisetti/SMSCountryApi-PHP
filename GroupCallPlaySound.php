<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

// GroupCallPlaySound
$connection = new Smscountryapi(KEY,TOKEN);
$data=$connection->GroupCallPlaySound($GroupCallUUID ="C47EDA9798E84F3588A33E1EAD3B38",$fileUrl="http://hourlylancer.com/play");
echo "<pre>";
echo $data; 














