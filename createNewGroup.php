<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

// create New Group
$connection = new Smscountryapi(KEY,TOKEN);
$Members=array();
$Members[0]=array('Name'=>'Test1','Number'=>'917206659903'); 
$Members[1]=array('Name'=>'Test2','Number'=>'917206644479');
$data=$connection->createNewGroup(uniqid('group_'),$TinyName="fdbdbdfd",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$Members); 
echo $data;
