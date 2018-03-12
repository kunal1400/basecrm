<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/19/2018
 * Time: 6:12 PM
 */

include_once("dbinit.php");
include_once("ui.php");




?><script src="js/js.js"></script>

    <table style="width:80%;<?=getStyle(100);?>;">
        <tr><td style="width:30%;"></td><td style="width:70%;"></td></tr>
<?

$ls=2;
$cs=6;
htext("pv","property value",$cs,$ls);
htext("zip","Zip",$cs,$ls);
htext("appname","App Name",$cs,$ls);
htext("lname","Lead Name",$cs,$ls);
htext("lemail","Lead Email",$cs,$ls);
htext("lnumber","Lead Number",$cs,$ls);
hbutton("sendlead","Send Fake Lead",6);

?></table>

<script >


    document.getElementById("sendlead").onclick=function() {
        var arr =  {
            pv:document.getElementById("pv").value,
            zip:document.getElementById("zip").value,
            appname:document.getElementById("appname").value,
            lname:document.getElementById("lname").value,
            lemail:document.getElementById("lemail").value,
            lnumber:document.getElementById("lnumber").value
        };

       myajax('/c/callcenter/Engine.php?arr=' + JSON.stringify(arr),function (resp) {

       },function(){});

    }

</script>
<?
include_once ("monitor.php");

