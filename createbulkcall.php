<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');


// create bulk call
$connection = new Smscountryapi(KEY,TOKEN); //i created a new object
$data=$connection->createbulkcall($Number="917206659903,917206644479",$CallerId="",$RingUrl="http://hourlylancer.com/answerurl",$AnswerUrl="http://hourlylancer.com/answerurl",$HangupUrl="http://hourlylancer.com/answerurl",$HttpMethod="POST",$Xml="xxx");
echo $data;
