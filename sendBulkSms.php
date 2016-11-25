<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw'); 
define('KEY','idyGs6msvBh7GZaE6EeM');


// sendBulkSms
$connection = new Smscountryapi(KEY,TOKEN);
$Numbers='919996253521,917206644479';
$Text='123456789';
$data=$connection->sendBulkSms($Text,$Numbers,$SenderId="",$DRNotifyUrl="",$DRNotifyHttpMethod="POST");
echo $data; 

