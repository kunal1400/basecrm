<?php

echo "hey";
include_once("ui.php");

echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
  echo '<link rel="stylesheet" href="/resources/demos/style.css">';
  echo '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>';
  echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';

 /*
*/
$id="sfdg";
$lable="lable";
$styleindex=4;
$Labelstyleindex=4;

 //hbutton($id,$lable,$styleindex);
hbutton($id,$lable,$styleindex," onclick = \"alert ('ss')\"");
 htext($id,$lable,$styleindex,$Labelstyleindex);
$options=array();
$options[0]="abb";
$options[1]="abc";
$options[2]="abd";
$options[3]="avd";
$options[4]="ddfa";
hselect($id,$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");
/**/

hautocomplete("sfg",$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");



 //hselect($id,$lable,$styleindex);
 //hdate($id,$lable,$styleindex);
//hautocomplete($id,$lable,$styleindex);