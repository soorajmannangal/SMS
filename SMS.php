<?php
set_time_limit(0);
class SMS {

   var $cURL_object;

   var $data;
   var $key;
   var $m_number;
   var $server;

   public function __construct() {
   $this->cURL_object = new cURL();
   $this->data = array();
   }

   public function log_in() {
   
   $out=($this->cURL_object->post("http://www.way2sms.com", "1=1"));
  $pattern="/Location:(.+?)\n/";
   preg_match($pattern, $out, $match_array);
   $domain=trim($match_array[1]);
   
   $this->data['domain'] = $domain;
   //echo "==="."{$domain}Login1.action"."===";
//   $out= $this->cURL_object->post("{$domain}auth.cl","username=9037223519&password=suith&Submit=Sign+in");
  $out= $this->cURL_object->post("{$domain}Login1.action","username=9037223519&password=suith&Submit=Sign+in");
   $pattern="/Location:(.+?)\n/";
   preg_match($pattern, $out, $match_array);
   $referer=trim($match_array[1]);
   echo "=======".$referer."=====";
   $this->data['referer'] = $referer;
   
   }

   public function send_SMS($m_number, $text)	{
   
   $domain=$this->data['domain'];
   //echo "-------"."{$domain}jsp/InstantSMS.jsp?val=0"."------";
   $out=$this->cURL_object->post("{$domain}jsp/InstantSMS.jsp?val=0", "1=1", $this->data['referer']);
//echo $out;
   $pattern = '/name="Action".+?value="(.*)"/';
   preg_match($pattern, $out, $match_array);
//foreach($match_array as $m){
	///echo $match_array[1]."<br/>".$match_array[0];   
//echo "<br/> =>".$m;
//}
	$action=$match_array[1];
//echo "|||||||||||".$action."||||||||||||||";
      $text=urlencode( $text );
   //$out=$this->cURL_object->post("{$domain}FirstServletsms?custid=", "custid=undefined&HiddenAction=instantsms&Action={$action}&login=&pass=&MobNo=$m_number&textArea=$text");
  $out=$this->cURL_object->post("{$domain}quicksms.action", "custid=undefined&catnamedis=Birthday&HiddenAction=instantsms&chkall=on&Action={$action}&login=&pass=&MobNo=$m_number&textArea=$text");
echo $out;
 //$out=$this->cURL_object->post("{$domain}quicksms.action", "custid=undefined&HiddenAction=instantsms&Action={$action}&login=&pass=&MobNo=$m_number&textArea=$text");
   }

}

?>
