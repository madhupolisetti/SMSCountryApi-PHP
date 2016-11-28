<?php
class Smscountryapi
{
    protected $authKey="";
    protected $authToken="";
	protected $url="https://restapi.smscountry.com/v0.1/Accounts";
	//protected $headers=array('Content-Type: application/json');
	protected $headers=array();
	
	public function __construct ( $authKey, $authToken ) {
    $this->authKey = $authKey;
    $this->authToken = $authToken;
	$this->headers = array(  
		"Content-Type: application/json",
		"Authorization: Basic ". base64_encode($this->authKey . ":" . $this->authToken)
		);		
	}
    public function getSmsDetails($messageUUID="d8f39d9a-8a36-4974-8b92-7ae0b83a1aa2")
    {
		
		$rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/SMSes/".$messageUUID."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);  
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;  

    }
	 public function getSmsCollection($FromDate="00:0",$ToDate="23:59:59",$SenderId="",$offset="",$limit=10)
    {
		
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/SMSes/?FromDate=".urlencode($FromDate)."&ToDate=".urlencode($ToDate)."&SenderId=".urlencode($SenderId)."&Offset=".urlencode($offset)."&Limit=".urlencode($limit));
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);  
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
	public function sendSms($Text="",$Number="",$SenderId="",$DRNotifyUrl="",$RNotifyHttpMethod="POST")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/SMSes/");
		curl_setopt($rest, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
				\"Text\": \"{$Text}\",
				\"Number\": \"{$Number}\",
				\"SenderId\": \"{$SenderId}\",
				\"DRNotifyUrl\": \"{$DRNotifyUrl}\",
				\"DRNotifyHttpMethod\": \"{$RNotifyHttpMethod}\",
				\"Tool\": \"API\"
			}");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
	public function sendBulkSms($Text="",$Numbersdata="",$SenderId="SMSCountry",$DRNotifyUrl="",$DRNotifyHttpMethod="POST")
    {
		
		$numbers=array();		
		foreach(explode(',',$Numbersdata) as $val):
		$numbers[]=stripslashes(trim('"'.$val.'"'));
		endforeach;
		$numbers='['.trim(implode(',',$numbers)).']';
		$numbers=(string)$numbers; 
			
		$rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/BulkSMSes/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest, CURLOPT_POST,TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
				\"Text\": \"{$Text}\",
				\"Numbers\":{$numbers},
				\"SenderId\": \"{$SenderId}\",
				\"DRNotifyUrl\": \"{$DRNotifyUrl}\",
				\"DRNotifyHttpMethod\": \"{$DRNotifyHttpMethod}\"
			}");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);
		curl_close($rest);  
		return $response;
    }
    
	public function numberArraycon($Numbers=array())
	{
		$num='';
		for($i=0;$i<count($Numbers);$i++)
		{
			$num.="\"$Numbers[$i]\",";
		}
		return rtrim($num,',');
	}
	
	/** Calls ***/
	public function getCallDetails($callUUID="")
    {
		
		$rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Calls/".$callUUID."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);  
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;  

    }
	 public function getCallsList($FromDate="00:0",$ToDate="23:59:59",$CallerId="98161ff6-3439-4a64-9375-b20a349e2234",$offset="",$limit=10)
    {
		
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Calls/?FromDate=".urlencode($FromDate)."&ToDate=".urlencode($ToDate)."&CallerId=".urlencode($CallerId)."&Offset=".urlencode($offset)."&Limit=".urlencode($limit));
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);  
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
	public function createNewCall($Number="7206659903",$CallerId="",$RingUrl="",$AnswerUrl="http://hourlylancer.com/answerurl",$HangupUrl="",$HttpMethod="POST",$Xml="xxx")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Calls/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
					\"Number\": \"$Number\",
					\"CallerId\": \"$CallerId\",
					\"RingUrl\": \"$RingUrl\",
					\"AnswerUrl\": \"$AnswerUrl\",
					\"HangupUrl\": \"$HangupUrl\",
					\"HttpMethod\": \"$HttpMethod\",
					\"Xml\": \"<Request><play>$Xml</play></Request>\"
					}");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function createbulkcall($Number="919041198393,917206644479",$CallerId="",$RingUrl="http://hourlylancer.com/answerurl",$AnswerUrl="http://hourlylancer.com/answerurl",$HangupUrl="http://hourlylancer.com/answerurl",$HttpMethod="POST",$Xml="xxx")
    {
		$numbers=array();		
		foreach(explode(',',$Number) as $val):
		$numbers[]=stripslashes(trim('"'.$val.'"'));
		endforeach;
		$numbers='['.trim(implode(',',$numbers)).']';
		$numbers=(string)$numbers;

		$rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/BulkCalls/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
					\"Numbers\":{$numbers},
					\"RingUrl\": \"{$RingUrl}\",
					\"AnswerUrl\": \"{$AnswerUrl}\",
					\"HangupUrl\": \"{$HangupUrl}\",
					\"HttpMethod\": \"{$HttpMethod}\",
					\"Xml\": \"<Request><play>$Xml</play></Request>\"
					}");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function disconnectCall($apiId="8c6ce9fb-9cdd-4fbb-be90-c41962302a71")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Calls/".$callUUID."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
    
    /*** Groups ***/
    
    public function createNewGroup($Name="",$TinyName="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$Members="")
    {		
		if(!empty($Members)):
			foreach($Members as $key=>$val):	
					 foreach($Members[$key] as $index=>$value):
								if($index === 'Name'):
								$Members[$key][$index]=stripslashes(trim($Members[$key][$index]));
								$index=stripslashes(trim($index));
								endif;
								if($index === 'Number'):
								$Members[$key][$index]=stripslashes(trim($Members[$key][$index]));
								$index=stripslashes(trim($index));
								endif;
					 endforeach;
			endforeach;
		endif;
		$Members=json_encode($Members); // members object		
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);  
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
					\"Name\": \"$Name\",
					\"TinyName\": \"$TinyName\",
					\"StartGroupCallOnEnter\": \"$StartGroupCallOnEnter\",
					\"EndGroupCallOnExit\": \"$EndGroupCallOnExit\",
					\"Members\":{$Members},
					}");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function GroupDetails($groupid="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }

   public function GetGroupsCollection($nameLike="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$TinyName="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/?nameLike={$nameLike}&StartGroupCallOnEnter={$StartGroupCallOnEnter}&EndGroupCallOnExit={$EndGroupCallOnExit}&TinyName={$TinyName}");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function UpdateGroup($groupid="",$Name="",$TinyName="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="")
    {
		
		(int) $groupid=$groupid;
		(string) $Name=$Name;
		(string) $TinyName=$TinyName;
		
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/{$groupid}/");
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, TRUE);  	
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($rest,CURLOPT_POSTFIELDS,"{
		\"Name\" :\"$Name\",
		\"TinyName\" :\"$TinyName\"
		}");
		$response = curl_exec($rest);      
		return $response;
    }
    
    public function DeleteGroup($groupid="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/");
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,false);   
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST,"DELETE");
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function MemberDetails($groupid="", $MemberId="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/Members/".$MemberId."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers); 
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function GetAllMembers($groupid="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/Members/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function UpdateMemberDetail($groupid="", $MemberId="",$Name="",$Number="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/Members/".$MemberId."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
			\"Name\": \"$Name\",
			\"Number\": \"$Number\"
		}"); 
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function DeleteMemberInGroup($groupid="", $MemberId="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/Members/".$MemberId."/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE); 
		curl_setopt($rest, CURLOPT_HEADER,FALSE); 
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "DELETE");
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function AddMemberExistingGroup($groupid="",$Name="",$Number="")
    {
       $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/Groups/".$groupid."/Members/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
		\"Name\": \"{$Name}\",
		\"Number\": \"{$Number}\"
		}");
		$response = curl_exec($rest);  
		return $response;

    }
    
    /*** Group Calls ***/
    
    public function CreateGroupCall($Name="",$WelcomeSoundUrl="",$WaitSoundUrl="",$StartGroupCallOnEnter="",$EndGroupCallOnExit="",$AnswerUrl="",$Participants=array()) {
  
		if(count($Participants) > 0):
			foreach($Participants as $key=>$val):	
					 foreach($Participants[$key] as $index=>$value):
								if($index === 'Name'):
								$Participants[$key][$index]=stripslashes(trim($Participants[$key][$index]));
								$index=stripslashes(trim($index));
								endif;
								if($index === 'Number'):
								$Participants[$key][$index]=stripslashes(trim($Participants[$key][$index]));
								$index=stripslashes(trim($index));
								endif;
					 endforeach;
			endforeach;
		endif; 
  
		$Participants=json_encode($Participants); // Participants object
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/");
		curl_setopt($rest,CURLOPT_HTTPHEADER, $this->headers); 
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest, CURLOPT_POST,TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS,"{
				\"Name\": \"{$Name}\",
				\"WelcomeSound\": \"{$WelcomeSoundUrl}\",
				\"WaitSound\": \"{$WaitSoundUrl}\",
				\"StartGroupCallOnEnter\": \"{$StartGroupCallOnEnter}\",
				\"EndGroupCallOnExit\": \"{$EndGroupCallOnExit}\",
				\"AnswerUrl\": \"{$AnswerUrl}\",
				\"Participants\":{$Participants}
		}");
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE); 
		$response = curl_exec($rest);  
		return $response; 
    }
    
    public function GetGroupCallList($FromDate="",$ToDate="",$Offset="",$Limit="10")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/?FromDate={$FromDate}&ToDate={$ToDate}&Offset={$Offset}&Limit={$Limit}");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function GroupCallDetails($GroupCallUUID ="")
    {
        $rest = curl_init();   
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function ParticipantDetails($GroupCallUUID ="",$ParticipantId="")
    {
        $rest = curl_init();   
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Participants/{$ParticipantId}/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);   
		return $response;
    }
    
    public function ParticipantsDetails($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/".$GroupCallUUID."/Participants/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function GroupCallPlaySound($GroupCallUUID ="",$fileUrl="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Play/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
					\"File\": \"{$fileUrl}\"
		}");
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function PlaySoundParticipantCall($GroupCallUUID ="", $ParticipantId="",$fileUrl="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Participants/{$ParticipantId}/Play/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_HEADER,FALSE);  
		curl_setopt($rest, CURLOPT_POST, TRUE);
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
			\"File\": \"{$fileUrl}\"
		}");
		$response = curl_exec($rest);   
		return $response;

    }
    
    public function MuteAllParticipant($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Mute/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		curl_setopt($rest,CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_CUSTOMREQUEST,"PATCH");
		$response = curl_exec($rest);  
		return $response; 
    }
    
    public function MuteParticipant($GroupCallUUID ="", $ParticipantId="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Participants/{$ParticipantId}/Mute/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST,"PATCH");  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function UnMuteAllParticipants($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/UnMute/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);  
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH");
		$response = curl_exec($rest); 
		return $response;

    }
    
    public function UnMuteParticipants($GroupCallUUID ="", $ParticipantId="")
    {
		$rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Participants/{$ParticipantId}/UnMute/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH");   
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function StartRecordingGroupCall($GroupCallUUID ="",$fileFormat="mp3")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_POST, TRUE);  
		curl_setopt($rest, CURLOPT_POSTFIELDS, "{
			\"FileFormat\": \"{$fileFormat}\"
		}");
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function StopRecordingGroupCall($GroupCallUUID ="", $RecordingUUID="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/{$RecordingUUID}/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest,CURLOPT_CUSTOMREQUEST,"PATCH");  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function StopAllRecordingsGroupCall($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH");  
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function GetRecordingGroupCall($GroupCallUUID ="", $RecordingUUID="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/{$RecordingUUID}/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_HEADER,FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function GetAllRecordingsDetails($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);   
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);  
		curl_setopt($rest,CURLOPT_HEADER,FALSE);
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function DeleteRecordingGroupCall($GroupCallUUID ="", $RecordingUUID="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/{$RecordingUUID}/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_CUSTOMREQUEST,"DELETE");
		$response = curl_exec($rest);  
		return $response;

    }
    
    public function DeleteAllRecordingsGroupCall($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Recordings/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest, CURLOPT_HEADER, FALSE); 
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "DELETE");	
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function DisconnectAllParticipants($GroupCallUUID ="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Hangup/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($rest,CURLOPT_CUSTOMREQUEST, "PATCH");  
		$response = curl_exec($rest);  
		return $response;
    }
    
    public function DisconnectParticipant($GroupCallUUID ="", $ParticipantId="")
    {
        $rest = curl_init();  
		curl_setopt($rest,CURLOPT_URL,$this->url."/".$this->authKey."/GroupCalls/{$GroupCallUUID}/Participants/{$ParticipantId}/Hangup/");
		curl_setopt($rest,CURLOPT_HTTPHEADER,$this->headers);
		curl_setopt($rest, CURLOPT_HEADER, FALSE);
		curl_setopt($rest,CURLOPT_SSL_VERIFYPEER,FALSE);  
		curl_setopt($rest,CURLOPT_RETURNTRANSFER,TRUE); 
		curl_setopt($rest, CURLOPT_CUSTOMREQUEST, "PATCH"); 
		$response = curl_exec($rest);  
		return $response;
    }

}
