<?php
include_once("dbinit.php");
include_once("ui.php");

basicheaderlocal("EMP Management",1,1);
    $table="employee";
    if($table=="employee")
        $fields=array(
            0=> "n1",
            1=> "username",
            2=> "userpassword",
            3=> "email"

);


?>

<script src="js/js.js"></script>
<script>

$( document ).ready(function() {
var table11="<?=$table?>";
var fields11 = ["n1", "username", "userpassword" ,"email"];

var fields11 = [

    <?
    $first=1;
    foreach($fields as $f){
    if($first==1)$first=2; else {echo ",";}
        echo "\"$f\"";

    }?>
];


init(table11,fields11);

});
</script>
<?
$id="s34345fdg";
$lable="la345345ble";
$styleindex=4;
$Labelstyleindex=4;
echo "<div style='width:100%;height:234px;border:1px solid;' id='debug' > </div>";
hbutton($id,$lable,$styleindex);
navigation();
?>
<br>
<?


begintoggle(1,"Fields");
?>


<table style="width:80%;<?=getStyle(100);?>;">
<tr><td style="width:30%;"></td><td style="width:70%;"></td></tr>
<?


//client(id ,sponserid ,casemanagerid ,activeclient ,i1 ,i2 ,i3 ,fname ,lname ,memberid ,referralid
 //streetaddress ,city ,st ,zip ,phone ,email ,documentsavename ,documentshowname ,n1 ,n2

 //username,userpassword ,n3 ,joindate ,packagemailedoutdate ,d1 ,linkid1)


foreach($fields as $f)
{
htext($f,$f,1,2);


}

//htext("fname","fname",1,2);
//htext("lname","lname",1,2);
//htext("memberid","memberid",1,2);
//htext("referralid","referralid",1,2);


/*
hbutton($id,$lable,$styleindex," onclick = \"alert ('ss')\"");
htext($id,$lable,$styleindex,$Labelstyleindex);

hselect($id,$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");


hautocomplete("sfg",$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");
*/

?></table><?
endtoggle(1);

functions();
?>
<script>
    $('.content-toggle').slideToggle('slow');

</body></html>


<?

function basicheader($title,$jquery=1,$bootstrap=1)
{
?>
    <html>
    <head>
    <title><?=$title?></title>


<?if($jquery==1){?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?}
    if($bootstrap==1){?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<?}

?>

    </head><body style="width:100%;">


    <?

}


function basicheaderlocal($title,$jquery=1,$bootstrap=1)
{
?>
    <html>
    <head>
    <title><?=$title?></title>


<?if($jquery==1){?>
    <link rel="stylesheet" href="js/jquery-ui.css">

    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
<?}
    if($bootstrap==1){?>
    <link rel="stylesheet" href="js/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="js/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<?}

?>

    </head><body style="width:100%;">


    <?

}

function navigation ()
{?>
<table  style="width:97%">
    <tr>
        <td>
            <input id="pervbtn" type="button" value="<">
            <input id="navid" type="text">
            <input id="nextbtn" type="button" value=">">
        </td>

    </tr>

    <tr><td><br></td></tr>
    <tr><td><hr></td></tr>
<tr></table>
<?
}


function functions()
{
?>
        <input id="savebtn" type="button" value="Save" style="<?=getStyle(3)?>">
        <input id="addbtn" type="button" value="Add" style="<?=getStyle(3)?>">
        <input id="deletebtn" type="button" value="Delete" style="<?=getStyle(3)?>">
        <input id="newbtn" type="button" value="New" style="<?=getStyle(3)?>">


<?
}

    function begintoggle($s,$title)
{?>
<div style="padding:2px;" class="sitesection">
    <div style="padding:3px;color:white; background-color: #2d2d2d;" class="ui-btn-text" id="expand-one<?=$s?>">
    <div style="display:inline;" ><img id="arrow<?=$s?>" src="images/arrow2.png" width="22" height="22" />
    </div>
    <div style="padding:3px;font-size:14pt;display:inline;">
    <?=$title?>
    </div>
    </div>
    <div class="ui-collapsible-content ui-body-d" id="content-one<?=$s?>">
<?}

    function endtoggle($s)
{
?>
</div>
</div>
<script>
$('#expand-one<?=$s?>').click(function(){
    $('#content-one<?=$s?>').slideToggle('slow');

    if( !$('#arrow<?=$s?>').hasClass ("hdeg"))
   {  $('#arrow<?=$s?>').css({        "-webkit-transform": "rotate(0deg)",        "-moz-transform": "rotate(0deg)",        "transform": "rotate(0deg)"},"slow");
   $('#arrow<?=$s?>').addClass("hdeg");
   }
    else{  $('#arrow<?=$s?>').css({        "-webkit-transform": "rotate(90deg)",        "-moz-transform": "rotate(90deg)",        "transform": "rotate(90deg)", },"slow");
$('#arrow<?=$s?>').removeClass("hdeg");

    }
});
</script>
<?
}