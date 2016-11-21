<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php')){
	die('! Smscountryapi.php not exist...');
}
include_once($_SERVER['DOCUMENT_ROOT'].'/smsapi/Smscountryapi.php');

define('TOKEN','QoVeIRIORSBkUn6pDg3AKLNFy126VOI7ohS2lRzw');
define('KEY','idyGs6msvBh7GZaE6EeM');

//Group call

//  CreateGroupCall
$connection = new Smscountryapi(KEY,TOKEN);
$Participants=array();
$Participants[0]=array('Name'=>'Test1','Number'=>''); 
$Participants[1]=array('Name'=>'Test2','Number'=>''); 
$Participants[2]=array('Name'=>'Test3','Number'=>'');
$data=$connection->CreateGroupCall($Name=uniqid('groupCall_'),$WelcomeSoundUrl="",$WaitSoundUrl="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$AnswerUrl="http://hourlylancer.com/answerurl",$Participants);
echo "<pre>";
echo $data;  
