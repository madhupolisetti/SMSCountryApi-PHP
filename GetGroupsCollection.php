<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

//  Get Groups Collection
$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetGroupsCollection($nameLike="group_582d502d26cab",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$TinyName="");
$data=$connection->GetGroupsCollection($nameLike="group_",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$TinyName="");
echo $data;  
