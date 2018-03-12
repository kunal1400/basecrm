<?php
header("Content-type: text/xml");
require_once "../include.php";

$rdc  = new rdc();
$rdc->twilio_gather_handler($_REQUEST['Digits']);
