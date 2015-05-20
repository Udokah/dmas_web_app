<?php
error_reporting(E_ALL); 
function __autoload($class) { include_once('class/class.'.$class.'.php'); } 
include('functions.php') ;
if(!isset($_GET)) die();

$_GET = sanitize($_GET) ;  // clean all inputs

$subscriber = $_GET['from'] ;
$textmsg = $_GET['text'] ;

if ( $subscriber == '' or $textmsg == '' ){
      echo 'empty fields ' ;
	  exit();  
}

// count string length must be 10 digits
$messgeType = 'InvalidPin' ; 
$days = '' ;

if($textmsg == 'testcode'){
             $sendSMS = sms::SendSMS( $subscriber , "This is a text message demo example for GFH" ) ;
              die();
}


if(strlen($textmsg) == 10){

$subscription = new subscription();
$subscription->pincode = $textmsg ;
$subscription->phone = $subscriber ;

   // Validate Pin Code 
  if( $subscription->ValidatePinCode() ){
// Check if user has subscribed before
       $subscription->getPinType() ;
	   
      if( $subscription->SubscriberExists() == false ){ 
	  
	     if ( $subscription->SubscribeNewPerson() ){
		     $messgeType = 'SubscribeSuccess' ;
			 $days = $subscription->type ;
	      }
		  else{
		       $messgeType = 'SubscribeError' ;
		  }
      }
      else{
            $messgeType = 'AlreadySubscribed' ;
       }
    }
  
 }
 
 $sendSMS = sms::SendSMS( $subscriber , subscription::Message($messgeType,$days) ) ;
 
 //echo $messgeType. '<br />' . $sendSMS  ;
 
 //exit();

?>
