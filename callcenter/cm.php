<?php



include_once("ui.php");
include_once("dbinit.php");
basicheaderlocal("Client Management",1,1);


//client(id ,sponserid ,casemanagerid ,activeclient ,i1 ,i2 ,i3 ,fname ,lname ,memberid ,referralid
 //streetaddress ,city ,st ,zip ,phone ,email ,documentsavename ,documentshowname ,n1 ,n2

 //username,userpassword ,n3 ,joindate ,packagemailedoutdate ,d1 ,linkid1)



    $table="employee";
    if($table=="employee")
        $fields=array(
            0=> "fname",
            1=> "lname",
            2=> "memberid",
            3=> "casemanagerid",
            4=> "city",
            5=> "st",
            6=> "streetaddress",
            7=> "phone",
            8=> "email",
            9=> "zip",
            10=> "username",
            11=> "userpassword",
            12=> "joindate",
            13=> "packagemailedoutdate",
            14=> "sponserid"
           // 15=> "referralid"
);







?>
<script src="js/testadmin.js"></script>

<script>

$( document ).ready(function() {
var table11="<?=$table?>";

var fields11 = [

    <?
    $first=1;
    foreach($fields as $f){

    if($first==1)$first=2; else {echo ",";}
        echo "\"$f\"";

    }?>
];


initsearch(table11,fields11);

});
</script>
<?

$id="sfdg";
$lable="lable";
$styleindex=4;
$Labelstyleindex=4;
echo "<div style='display:none;width:100%;height:234px;border:1px solid;' id='debug' > </div>";
 //hbutton($id,$lable,$styleindex);

navigation();
?>
<br>
<?

$options=array();$options[0]="abb";$options[1]="abc";$options[2]="abd";$options[3]="avd";$options[4]="ddfa";

$cs=getoptions("casemanager","n1");
$ss=getoptions("sponser","n1");



//-------------------------------------------------------------------------------SEARCH


begintoggle(0,"Search");
?><table style="text-align:left;width:65%;<?=getStyle(100);?>;">
<tr><td style="width:40%;"></td><td style="width:70%;"></td></tr>
<?


//client(id ,sponserid ,casemanagerid ,activeclient ,i1 ,i2 ,i3 ,fname ,lname ,memberid ,referralid
 //streetaddress ,city ,st ,zip ,phone ,email ,documentsavename ,documentshowname ,n1 ,n2

 //username,userpassword ,n3 ,joindate ,packagemailedoutdate ,d1 ,linkid1)


htext("fname","First Name",1,4,"",1);
htext("lname","Last Name",1,4,"",1);
htext("memberid","Member ID",1,4,"",1);
//htext("referralid","Refferal ID",1,4,"",1);
htext("city","City",1,4,"",1);
htext("st","ST",1,4,"",1);
htext("streetaddress","Street Address",1,4,"",1);
htext("zip","ZIP",1,4,"",1);
htext("phone","Phone",1,4,"",1);
htext("email","Email",1,4,"",1);
htext("username","User Name",1,4,"",1);
htext("userpassword","User Password",1,4,"",1);


hdate("joindate","JoinDate",1,4,"",1,1);
hdate("packagemailedoutdate","Packag Emailed out Date",1,4,"",1,1);

//hcheckbox("activeclient","activeclient",1,4,"",1);


hautocomplete("sponserid","Sponser (autocomplte)",1,4,$ss,$ss[0],"",1);
hautocomplete("casemanagerid","Case Manager (autocomplte)",1,4,$cs,$cs[0],"",1);



?>
   <tr> <td></td><td></td><td><input id="searchbtn" type="button" value="Search" style="<?=getStyle(3)?>"></td></tr>

</table>
<div id="searchresults"></div>

<?



endtoggle(0);











//=-----------------------------------------------------------------------------------------
begintoggle(1,"Fields");
?><table style="text-align:left;width:50%;<?=getStyle(100);?>;">
<tr><td style="width:30%;"></td><td style="width:70%;"></td></tr>
<?


//client(id ,sponserid ,casemanagerid ,activeclient ,i1 ,i2 ,i3 ,fname ,lname ,memberid ,referralid
 //streetaddress ,city ,st ,zip ,phone ,email ,documentsavename ,documentshowname ,n1 ,n2

 //username,userpassword ,n3 ,joindate ,packagemailedoutdate ,d1 ,linkid1)

htext("fname","First Name",1,2);
htext("lname","Last Name",1,2);
htext("memberid","Member ID",1,2);
//htext("referralid","Refferal ID",1,2);
htext("city","City",1,2);
htext("st","ST",1,2);
htext("streetaddress","Street Address",1,2);
htext("zip","Zip",1,2);
htext("phone","Phone",1,2);
htext("email","Email",1,2);
htext("username","User Name",1,2);
htext("userpassword","User Password",1,2);


hdate("joindate","Join Date",1,2);
hdate("packagemailedoutdate","Packag Emailed out Date",1,2);

hcheckbox("activeclient","Active Client",1,2);


hautocomplete("sponserid","Sponser ID",1,2,$ss,$options[0]);
hautocomplete("casemanagerid","Case Manager ID",1,2,$cs,$options[0]);



/*
hbutton($id,$lable,$styleindex," onclick = \"alert ('ss')\"");
htext($id,$lable,$styleindex,$Labelstyleindex);

hselect($id,$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");


hautocomplete("sfg",$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="");
*/

?></table><?
endtoggle(1,1);
begintoggle(2,"Email");
//hselect($id,$lable,$styleindex);
//hdate($id,$lable,$styleindex);
//hautocomplete($id,$lable,$styleindex);
email();
endtoggle(2);
begintoggle(3,"Attach Document");
uploaddocument();
endtoggle(3);
begintoggle(4,"Client Sessions");

sessions();
endtoggle(4);
begintoggle(5,"Client Refunds");
refunds();
endtoggle(5);



functions();
?>
<script>
    $('.content-toggle').slideToggle('slow');

<?
    if(isset($_GET[cid]))
    {
        ?>

        var id=<?=$_GET[cid]?>;
        var url="infoman.php?q=setdata&id="+id;

        myajax(url,setdata,fail)

<?
}
else
{?>
loadlastrecord();
<?

}
?>
</script>
</body></html>


<?

function uploaddocument()
{?>
<div>
<table style="width:80%;<?=getStyle(100);?>;">
<tr><td style="width:30%;"></td><td style="width:70%;"></td></tr>

<form action="uploader.php" method="post" enctype="multipart/form-data" target="upload_target" >
<tr><td>
          <input id="clientdocument" name="clientdocument" type="file" multiple  ></td><td></td></tr>
          <tr><td><input type="submit" name="submitBtn" value="Upload" onclick="//uploadfile()"  style="<?=getStyle(3)?>"></td><td></td></tr>
</form>
</table></div>
<?
}

function uploaddocument1()
{?>

<input type="file" id="clientdocument"  style="<?=getStyle(3)?>">
<input type="button" onclick="uploadfile()" value="Upload">
<?
}
function email()
{

?>
<div>
<table style="width:50%;<?=getStyle(100);?>;">
<tr><td style="width:20%;"></td><td style="width:80%;"></td></tr>
<form id="mailform" target="s" method="post">
<tr>
<td style="<?=getStyle(2)?>">
Title
 </td>
 <td><input  class="std_textbox" type="text" id="emailtitle">
 </td>
</tr>
<tr>

<td style="<?=getStyle(2)?>">Message</td><td><textarea  class="std_textbox" id="emailbody" style="<?=getstyle(6)?>margin: 0px; width: 592px; height: 222px;"></textarea></td>
</tr>
<br>
<tr><td></td><td><input type="button"  value="Send to all Clients" onclick="sendemailall()" style="<?=getStyle(3)?>"><input type="button"  value="Send Email" onclick="sendemail()" style="<?=getStyle(3)?>"></td></tr>
</form>
</table>
</div>

<?



}


function sessions()
{
?>
<div>
<table style="width:80%;<?=getStyle(100);?>;">
<tr><td style="width:100%;"></td></tr>
<tr><td>
<div id='sessions' style='width:100%;'></div>
</td></tr>
</table></div>
<?
}

function refunds()
{?>


<div>
<table style="width:80%;<?=getStyle(100);?>;">
<tr><td style="width:100%;"></td></tr>
<tr><td>
<div id='refunds' style='width:100%;'></div>
</td></tr>
</table></div>



<?
}

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
 <link href="./cPanel Login_files/open_sans.min.css" rel="stylesheet" type="text/css">
    <link href="./cPanel Login_files/style_v2_optimized.css" rel="stylesheet" type="text/css">

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
 <link href="./cPanel Login_files/open_sans.min.css" rel="stylesheet" type="text/css">
    <link href="./cPanel Login_files/style_v2_optimized.css" rel="stylesheet" type="text/css">

    </head><body style="width:100%;">


    <?

}

function navigation ()
{?>
<table  style="width:97%">
    <tr>
        <td>
            <input id="pervbtn" type="button" value="<"  style="<?=getStyle(3)?>margin-bottom:10px;margin-left:30px;">
            <input id="navid" class='std_textbox' type="text" style="<?=getStyle(1)?>;width:50px;">
            <input id="nextbtn" type="button" value=">"  style="<?=getStyle(3)?>margin-bottom:10px;">
        </td>

    </tr>

</table>
<?
}


function functions()
{
?>
        <input id="savebtn" type="button" value="Save" style="<?=getStyle(3)?>margin-bottom:30px;margin-left:30px;">
        <input id="addbtn" type="button" value="Add" style="<?=getStyle(3)?>margin-bottom:30px;">
        <input id="deletebtn" type="button" value="Delete" style="<?=getStyle(3)?>margin-bottom:30px;">
        <input id="newbtn" type="button" value="New" style="<?=getStyle(3)?>margin-bottom:30px;">


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

    function endtoggle($s,$initial=0)
{
?>
</div>
</div>
<script>

<? if($initial==1){?>$('#content-one<?=$s?>').slideDown('slow');<?}
 else{?>$('#content-one<?=$s?>').slideUp('slow');<?}?>

$('#expand-one<?=$s?>').click(function(){
    $('#content-one<?=$s?>').slideToggle('slow');

    if( !$('#arrow<?=$s?>').hasClass ("hdeg"))
   {  $('#arrow<?=$s?>').css({"-webkit-transform": "rotate(0deg)","-moz-transform": "rotate(0deg)","transform": "rotate(0deg)"},"slow");
   $('#arrow<?=$s?>').addClass("hdeg");
   }
    else{  $('#arrow<?=$s?>').css({"-webkit-transform": "rotate(90deg)","-moz-transform": "rotate(90deg)","transform": "rotate(90deg)", },"slow");
$('#arrow<?=$s?>').removeClass("hdeg");

    }
});
</script>
<?

}