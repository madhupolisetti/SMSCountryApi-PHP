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
//$connection = new Smscountryapi(KEY,TOKEN); //i created a new object
//$data=$connection->createbulkcall($Number="917206659903,917206644479",$CallerId="",$RingUrl="http://hourlylancer.com/answerurl",$AnswerUrl="http://hourlylancer.com/answerurl",$HangupUrl="http://hourlylancer.com/answerurl",$HttpMethod="POST",$Xml="xxx");
//echo $data;



// create New Group
//$connection = new Smscountryapi(KEY,TOKEN);
//$Members=array();
//$Members[0]=array('Name'=>'Test1','Number'=>'917206659903'); 
//$Members[1]=array('Name'=>'Test2','Number'=>'917206644479');
//$data=$connection->createNewGroup(uniqid('group_'),$TinyName="fdbdbdfd",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$Members); 
//echo $data;


//  Get Groups Collection
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetGroupsCollection($nameLike="group_582d502d26cab",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$TinyName="");
//$data=$connection->GetGroupsCollection($nameLike="group_",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$TinyName="");
//echo $data;   


// update group
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->UpdateGroup($groupid=90,$Name="group_582d4e4000714",$TinyName="vdfvdvf",$StartGroupCallOnEnter="",$EndGroupCallOnExit="");
//echo $data;


// delete group
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DeleteGroup($groupid=98);
//echo $data;


// get MemberDetails
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->MemberDetails($groupid=90, $MemberId=240);
//echo $data; 


// get all members
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetAllMembers($groupid="90"); 
//echo $data;


// update member detail
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->UpdateMemberDetail($groupid=90,$MemberId=240,$Name="vvvsdvsv",$Number=917206659903);
//echo $data;  


// delete member existing group
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DeleteMemberInGroup($groupid=90,$MemberId=264); 
//echo $data;    


// AddMemberExistingGroup
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->AddMemberExistingGroup($groupid=90,$Name="dfbdfb",$Number=919041198393);
//echo $data;  




//Group call


//  CreateGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$Participants=array(); 
//$Participants[0]=array('Name'=>'Test1','Number'=>'917206659903'); 
//$Participants[1]=array('Name'=>'Test2','Number'=>'917206644479'); 
//$Participants[2]=array('Name'=>'Test3','Number'=>'919996253521'); 
//$data=$connection->CreateGroupCall($Name=uniqid('groupCall_'),$WelcomeSoundUrl="",$WaitSoundUrl="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$AnswerUrl="http://hourlylancer.com/answerurl",$Participants);
//echo "<pre>";
//echo $data;   


// GetGroupCallList
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetGroupCallList($FromDate="2016-11-18",$ToDate="2016-11-21",$Offset="1",$Limit="200"); 
//echo "<pre>";
//echo $data; 
 

//  GroupCallDetails
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GroupCallDetails($GroupCallUUID="E3FD6F54B20246CAB6ECDE090E43ED");
//echo "<pre>";
//echo $data;

// ParticipantDetails
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->ParticipantDetails($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED",$ParticipantId="");   
//echo "<pre>";
//echo $data;


// ParticipantsDetails
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->ParticipantsDetails($GroupCallUUID ="AF262D766BAC48EC8795FC8B00F384"); 
//echo "<pre>";
//echo $data;

// GroupCallPlaySound
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GroupCallPlaySound($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED",$fileUrl="http://hourlylancer.com/play");
//echo "<pre>";
//echo $data; 

// PlaySoundParticipantCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->PlaySoundParticipantCall($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $ParticipantId="1562",$fileUrl="http://hourlylancer.com/play");
//echo $data; 

// MuteAllParticipant
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->MuteAllParticipant($GroupCallUUID="E3FD6F54B20246CAB6ECDE090E43ED");
//echo $data;

// MuteParticipant
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->MuteParticipant($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $ParticipantId="1540");
//echo $data;


// UnMuteAllParticipants
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->UnMuteAllParticipants($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED");
//echo $data;

// UnMuteParticipants
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->UnMuteParticipants($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $ParticipantId="1540");
//echo $data;

// StartRecordingGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->StartRecordingGroupCall($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED",$fileFormat="mp3");
//echo $data;


// StopRecordingGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->StopRecordingGroupCall($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $RecordingUUID="VKJDFKVDFVB905890JNFJ");
//echo $data;

// StopAllRecordingsGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->StopAllRecordingsGroupCall($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED");
//echo $data;


// GetRecordingGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetRecordingGroupCall($GroupCallUUID ="58AB6742C7A64AAF9B02843F907A20", $RecordingUUID="1e17830b-f190-4144-8ecd-9c229e632385");
//echo "<pre>";
//echo $data;

// GetAllRecordingsDetails
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->GetAllRecordingsDetails($GroupCallUUID ="58AB6742C7A64AAF9B02843F907A20");
//echo $data;

//DeleteRecordingGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DeleteRecordingGroupCall($GroupCallUUID ="4FA94FA2720544B1B59B4EAA8EA8E9", $RecordingUUID="VKJDFKVDFVB905890JNFJ");
//echo $data;

// DeleteAllRecordingsGroupCall
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DeleteAllRecordingsGroupCall($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED");
//echo $data;


// DisconnectAllParticipants
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DisconnectAllParticipants($GroupCallUUID ="E3FD6F54B20246CAB6ECDE090E43ED");
//echo $data;


// DisconnectParticipant
//$connection = new Smscountryapi(KEY,TOKEN);
//$data=$connection->DisconnectParticipant($GroupCallUUID ="CD351BBA06AB48608D9F7DA41D2AD0", $ParticipantId="1540");
//echo $data;


//die('dd');
//$conn=$connection->getSmsDetails('a705324e-5437-4905-9bb1-62b9e3b9b611'); 
//$conn=$connection->getSmsCollection('','2015-02-19 15:04','','',3); 
//$conn=$connection->sendSms('hello php testing','918284008438','SMSCou');
//$conn=$connection->sendBulkSms('hello php testing bult',array('918284008438','919815091410'));
//$conn=$connection->numberArraycon(array('918284008438','919815091410'));
//$conn=$connection->getCallDetails('b2916af6-2fab-4218-b739-d66a48ed50f3');
//$conn=$connection->getCallsList('','2015-02-19 15:04','','',3); 
/* $conn = $connection->UpdateGroup();
echo "<pre>";
print_r($conn); */
//~ $notify = json_decode($conn);
//~ echo $success = $notify->Success;
//~ echo "Message:".$message = $notify->Message;
//~ if($success=='true')
//~ {
	//~ echo "<br>Success : True<br>Message : '".$message."'";
//~ }
//~ else if($success=='false')
//~ {
	//~ echo "<br>Success: False<br>Message : '".$message."'";
//~ }
