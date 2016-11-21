<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

// GetRecordingGroupCall
$connection = new Smscountryapi(KEY,TOKEN);
$data=$connection->GetRecordingGroupCall($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $RecordingUUID="VKJDFKVDFVB905890JNFJ");
echo $data;
