<?php

//file_put_contents("output.txt","justa test 34");
require_once "include13.php";
//echo "asd";
$rdc = new rdc();
//echo "d";
$rdc->pr("111111111111");
$rdc->run_email_loop();
$rdc->pr("2222222222222");
$rdc->writeoutput();
//file_put_contents("output.txt",$rdc->s);
