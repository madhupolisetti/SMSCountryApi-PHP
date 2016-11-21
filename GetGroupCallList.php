<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

// GetGroupCallList
$connection = new Smscountryapi(KEY,TOKEN);
$data=$connection->GetGroupCallList($FromDate="2016-11-18",$ToDate="2016-11-18",$Offset="1",$Limit="200"); 
echo "<pre>";
echo $data; 
