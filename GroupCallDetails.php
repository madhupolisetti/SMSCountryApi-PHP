<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');


//  GroupCallDetails
$connection = new Smscountryapi(KEY,TOKEN);
$data=$connection->GroupCallDetails($GroupCallUUID="E3FD6F54B20246CAB6ECDE090E43ED");
echo "<pre>";
echo $data;
