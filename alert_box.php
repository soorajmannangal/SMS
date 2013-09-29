<?php

//error_reporting(E_ALL);
//ob_implicit_flush(true);
//$a = set_time_limit(0);
include_once 'class.sms.php';


//$handle->log_in();
$m_num=$_POST['text'];
$content = $_POST['text1'];
$count = $_POST['text2'];
if(is_numeric($m_num) && is_numeric($count))
{

while($count>0)
{
    $sms = new sms();
    $sms->fullonsms("9037223519", "suith", $m_num, $content);
     //sleep(7);
    $count = $count-1;
    print($count."<br/>");
    print($m_num."--->".$content."<br />");
    
}
}
//echo phpinfo();
else print("<br/>error your ip is recorded"."<br/>".$_SERVER['REMOTE_ADDR']);

?>
