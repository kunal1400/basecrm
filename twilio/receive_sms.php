<?php

require_once "../include.php";

$rdc  = new rdc();
$rdc->receive_sms($_REQUEST['From'], $_REQUEST['To'],$_REQUEST['Body']);




