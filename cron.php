<?php
//die("magic...");
require_once "include.php";
$rdc = new rdc();
//$rdc->twilio_make_call("+16023131343","+919977072663","+919584833502");
$rdc->twilio_generate_xml("+16023131343", "+919584833502");
//$rdc->twilio_make_call("+917000115754","+919584833502","+919584833502");
//die;
//$rdc->run_email_loop();

?>
