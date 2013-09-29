<?php
include_once 'cURL.php';
$msg = $_GET['message'];
$key = $_GET['key'];
$cURL_object;
if(isset($key)){
	$msgs = explode(" ",$msg);

echo"<html><body>";	
	if(($msgs[0] == "code") || ($msgs[0] =="CODE")){
	 //char to code
		echo "ASCII code of ".$msgs[1][0]." is ".ord($msgs[1]);	
	}
	if(($msgs[0] == "char") || ($msgs[0]=="CHAR")){
	//code to char
		if(is_numeric($msgs[1]) && $msgs[1]<128)
		    echo "ASCII code ".$msgs[1]." is ".chr($msgs[1]);
		else echo "Give a valid ASCII code";
	}
echo "</body></html>";
if(isset($msgs[2])){
		echo "<br/>".$msgs[2]."<br/>".count($msgs);
		$m = "";
              for($i=2;$i<count($msgs);$i++){
			$m .=$msgs[$i]." ";
                }
		$msgs[2] = $m;
		echo "<br/>".$m;
		$cURL_object = new cURL();
		if($msgs[1] == "a")	
			$cURL_object->post("http://www.mcalocal.x10.mx/sms/test.php?msg=".urlencode($msgs[2]),"1=1" );
		else if($msgs[1] == "b")
			$cURL_object->post("http://www.mcalocal.x10.mx/sms/test1.php?msg=".urlencode($msgs[2]),"1=1" );
	}
}
?>
