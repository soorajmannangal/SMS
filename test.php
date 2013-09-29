<?php

include_once 'class.sms.php';
$sms=new sms();

$sms->fullonsms("9037223519", "suith", "9037223519", date("d/m/Y - H:i:s"));
sleep(7);

?>