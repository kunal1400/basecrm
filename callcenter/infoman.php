<?php
include_once("dbinit.php");
include_once("ui.php");
include_once("bussiness/Client.php");
session_start();
 //$_SESSION['userID']=$userid;
header ('Content-type: text/html; charset=utf8');

if($_GET['q']=="add") {
$v=validate();
if($v!=1) {echo $v;die;}


 $csid=getidbytext('casemanager','id','n1',$_GET[casemanagerid]);
    $spid=getidbytext('sponser','id','n1',$_GET[sponserid]);

$q="insert into `client`(`sponserid`,`casemanagerid`,`activeclient`,`i1`,`i2`,`i3`,`fname`,`lname`,`memberid`,`referralid`
,`streetaddress`,`city`,`st`,`zip`,`phone`,`email`,`documentsavename`,`documentshowname`,`n1`,`n2`
,`username`,`userpassword`,`n3`,`joindate`,`packagemailedoutdate`,`d1`,`linkid1`) values (
        $spid,
$csid,
$_GET[activeclient],
$_GET[i1],
$_GET[i2],
$_GET[i3],
\"$_GET[fname]\",
\"$_GET[lname]\",
\"$_GET[memberid]\",
\"$_GET[referralid]\",
\"$_GET[streetaddress]\",
\"$_GET[city]\",
\"$_GET[st]\",
\"$_GET[zip]\",
\"$_GET[phone]\",
\"$_GET[email]\",
\"$_GET[documentsavename]\",
\"$_GET[documentshowname]\",
\"$_GET[n1]\",
\"$_GET[n2]\",
\"$_GET[username]\",
\"$_GET[userpassword]\",
\"$_GET[n3]\",
\"$_GET[joindate]\",
\"$_GET[packagemailedoutdate]\",
\"$_GET[d1]\",
$_GET[linkid1]

        )";
    //pr_dump("query",$q);
fastquery($q);
echo 1;
  }
else if($_GET['q']=="save") {

    $csid=getidbytext('casemanager','id','n1',$_GET[casemanagerid]);
    $spid=getidbytext('sponser','id','n1',$_GET[sponserid]);


    //$joindate=-11-22 12:45:34//2014-11-22 12:45:34

//echo $csid;
//    echo "<br>".$spid;
    $q="update `client` set
`sponserid`=$spid
,`casemanagerid`=$csid
,`activeclient`=$_GET[activeclient]
,`i1`=$_GET[i1]
,`i2`=$_GET[i2]
,`i3`=$_GET[i3]
,`fname`=\"$_GET[fname]\"
,`lname`=\"$_GET[lname]\"
,`memberid`=\"$_GET[memberid]\"
,`referralid`=\"$_GET[referralid]\"
,`streetaddress`=\"$_GET[streetaddress]\"
,`city`=\"$_GET[city]\"
,`st`=\"$_GET[st]\"
,`zip`=\"$_GET[zip]\"
,`phone`=\"$_GET[phone]\"
,`email`=\"$_GET[email]\"
,`documentsavename`=\"$_GET[documentsavename]\"
,`documentshowname`=\"$_GET[documentshowname]\"
,`n1`=\"$_GET[n1]\"
,`n2`=\"$_GET[n2]\"
,`n2`=\"$_GET[n3]\"
,`username`=\"$_GET[username]\"
,`userpassword`=\"$_GET[userpassword]\"
,`n3`=\"$_GET[n3]\"
,`joindate`=\"$_GET[joindate]\"
,`packagemailedoutdate`=\"$_GET[packagemailedoutdate]\"
,`d1`=\"$_GET[d1]\"
,`linkid1`=$_GET[linkid1]

 where id=$_GET[id]";

hprjs("q",$q);
    fastquery($q);


}
else if($_GET['q']=="maxnavid") {$max=getmininfoid("max","client");echo $max; }
else if($_GET['q']=="del") {fastquery("delete from `client` where id=$_GET[id]");}
else if ($_GET['q']=="getsessions"){getsessions();}
else if($_GET['q']=="nextadmin") {$id1=getmininfoid("min","client",$_GET[id]);   if($id1!=false){getandprint($id1);}        }
else if($_GET['q']=="pervadmin") {$id1=getmininfoid("max","client",$_GET[id]);   if($id1!=false){getandprint($id1);}        }
else if($_GET['q']=="setdata") {$id1=$_GET[id];   if($id1!=false){getandprint($id1);}        }
//-------------------------------------------Session logic
else if ($_GET['q']=="getsessions"){getsessions();}
else if($_GET['q']=="schedulesessions") {$id1=$_GET[clientid];   if($id1!=false){
schedulesessions($id1,$_GET[count],$_GET[fdate]);

}        }
else if($_GET['q']=="deletesession") {fastquery("delete from clientsessions where id=".$_GET[sessionid]); }
else if($_GET['q']=="updatesession")
{
$d=convertdatetomysql($_GET[sdate]);
fastquery("update  clientsessions set d1=\"$d\" ,notes=\"$_GET[snotes]\" where id=".$_GET[sessionid]);
}

//-------------------------------------------refund logic
else if ($_GET['q']=="getrefunds"){getrefunds();}
else if($_GET['q']=="addrefund") {$id1=$_GET[clientid];   if($id1!=false){
addrefund($id1,$_GET[amount],$_GET[rdate]);

}        }
else if($_GET['q']=="deleterefund") {fastquery("delete from clientrefunds where id=".$_GET[refundid]); }
else if($_GET['q']=="updaterefund") {
$d=convertdatetomysql($_GET[rdate]);
fastquery("update  clientrefunds set d1=\"$d\" ,refundamount=\"$_GET[ramount]\" where id=".$_GET[refundid],1); }
//-----------------------------------------------------SendEmail
//var url="infoman.php?q=sendemail&emailtitle="+emailtitle+"&emailbody="+emailbody+"clientid="+clientid;
else if($_GET['q']=="sendemail") {
$emailtitle =$_GET[emailtitle];
$emailbody =$_GET[emailbody];
$clientid =$_GET[clientid];

$toemail=gettextbyid("client","id","email",$clientid);
sendemail($emailtitle,$emailbody,"info@ZTP.com",$toemail);

 }
 else if($_GET['q']=="sendemailall") {
$emailtitle =$_GET[emailtitle];
$emailbody =$_GET[emailbody];
$clientid =$_GET[clientid];

$toemail=gettextbyid("client","id","email",$clientid);

$res=fastquery("select `email` from `client`");
foreach($res as $r)
{
$toemail=$r[email];
sendemail($emailtitle,$emailbody,"info@ZTP.com",$toemail);
}
 }
else if ($_GET['q']=="search"){search();}
function search()
{
$q="select * from `client` ";
    $table="employee";
    if($table=="employee")
        $fields=array(
              0=> "fname",
            1=> "lname",
            2=> "memberid",
            3=> "packagemailedoutdate",
            4=> "city",
            5=> "st",
            6=> "streetaddress",
            7=> "phone",
            8=> "email",
            9=> "zip",
            10=> "username",
            11=> "userpassword",
            12=> "joindate",
            //13=> "",
            13=> "sponserid",
            14=> "casemanagerid"
);

$first=1;
for($i=0;$i<sizeof($fields).length;$i++)
    {
$f=$fields[$i];
        $i1=$f."check";
        $i2="s".$f;
        $f1=$_GET[$i1];
        $f2=$_GET[$i2];

if($f1=="true")
{
if($first==1){$first=2;$q.=" where ";}
else $q.=" and ";


if($f=="sponserid"){
//hpr("f2",$f2);
$sp=getidbytext("sponser","id","n1",$f2);
//hpr("sp",$sp);
$q.=" `$f` =".$sp."";
}
else if($f=="casemanagerid"){$cm= getidbytext("casemanager","id","n1",$f2);
$q.=" `$f` =".$cm."";
}
else if($f=="joindate"){
$q.=" `$f` > '$_GET[sjoindate]'";
$q.=" and `$f` < '$_GET[ssjoindate]'";
}
else if($f=="packagemailedoutdate"){
$q.=" `$f` >'$_GET[spackagemailedoutdate]'";
$q.=" and `$f` < '$_GET[sspackagemailedoutdate]'";
}
else
$q.=" `$f` like \"%".$f2."%\"";







//hpr("fi", $i1.",".$i2.",".$f1.",".$f2.",");
    }
    }

//hpr("q",$q);
$res=fastqueryselect($q);

tablehead(
            "fname",
            "lname",
            "memberid",
            "st",
            "phone",
            "city",
            "joindate",
            "packagemailedoutdate",
            "sponserid",
            "casemanagerid"
            );
foreach($res as $r)
{

tableRecord(

            $r[id],
            $r[fname],
            $r[lname],
            $r[memberid],
            $r[st],
            $r[phone],
            $r[city],
           convertdatetojs( $r[joindate]),
           convertdatetojs(  $r[packagemailedoutdate]),
            gettextbyid("sponser","id","n1",$r[sponserid]),
            gettextbyid("casemanager","id","n1",$r[casemanagerid])
            );
}



}


function tablehead($i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10)
{?>
<table    style="background: darkorange;text-align:center;width: 100%;border-radius: 2px;
    border: 2px solid #bebebe;">
<tr><?
echo s($i1);
echo s($i2);
echo s($i3);
echo s($i4);
echo s($i5);
echo s($i6);
echo s($i7);
echo s($i8);
echo s($i9);
echo s($i10);?>
</tr>
<?
}
function s($i){

return "<td style='padding: 5px; border: 2px solid #bebebe;'>$i</td>";

    }

function tableRecord($id,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10)
{?>
<tr><?
echo aa($id,$i1);
echo aa($id,$i2);
echo aa($id,$i3);
echo aa($id,$i4);
echo aa($id,$i5);
echo aa($id,$i6);
echo aa($id,$i7);
echo aa($id,$i8);
echo aa($id,$i9);
echo aa($id,$i10);
?>
</tr>
<?}

function aa($id,$s)
{
return "<td  style='padding: 5px; border: 2px solid #bebebe;'><a href='cm.php?cid=$id'>$s</a></td>";

}
//------------------------------------------------------------------
function schedulesessions($clientid,$count,$fdate)
{
//$dt=new DateTime();
//Datetime.date_create_from_format();
hpr("fdate",$fdate);
$dt=date_create_from_format("m/d/Y",$fdate);
//$d=$fdate;
hpr("dt",$dt);
for($i=0;$i<$count;$i++)
{
$dt=$dt->add(new DateInterval('P14D'));
$s =$dt->format('Y-m-d');
echo $s;
fastquery("insert into `clientsessions` (`d1`,`clientid`) values (\"$s\",$clientid)",1);



}

}

function getsessions()
{
    $id=$_GET['clientid'];
    $res=fastqueryselect("select * from clientsessions where clientid=".$id." order by d1 desc");
    echo "<table style=''>";
    foreach($res as $r)
    {
        drawsession($r);
    }
?>
</table>
<table style="<?=getStyle(100);?>;border:1px black solid;-khtml-border-radius: 4px;    border-radius: 4px;    border: 2px solid #bebebe;">
<tr>
<td style="<?=getStyle(4);?>">
First Session Date </td><td><input id="fdate" class='std_textbox' type="text" class="hasDatepicker1"/></td></tr>
<tr>
<td style="<?=getStyle(4);?>">
Count of session to schedule
</td><td>
<input id="scount" class='std_textbox'  type="text" />
</td>
</tr>
<tr><td></td><td><input id="schedulesessions"  type="button"onclick="schedulesessions()" value="Schedule" style="<?=getStyle(3)?>"></td></tr>

</table>
<?

}
function drawsession($r)
{
    $id=$r[id];

$d=convertdatetojs($r[d1]);

    ?>
    <tr>
        <td><input  class="" type="button" id="sessiondelete<?=$id?>" style=" background: url(images/delete.png) no-repeat;width:22px;background-size: contain;display:block;" sessionid="<?=$id?>" onclick="deletesession(<?=$id?>)"></td>
        <td><input  class="std_textbox" type="text" id="sessiondate<?=$id?>" value="<?=$d?>"></td>
        <td><input class="std_textbox" type="text" id="sessionnotes<?=$id?>" style="display:block;" value="<?=$r[notes]?>"></td>
        <td><input class="" type="button" id="sessionupdate<?=$id?>" style=" background: url(images/Refresh.png) no-repeat;width:22px;background-size: contain;" sessionid="<?=$id?>"  onclick="updatesession(<?=$id?>)"></td>

    </tr>

<?
}

//-------------------------------------------------------------------------------refund functions



function addrefund($clientid,$amount,$rdate)
{
$d=$rdate;
$s =convertdatetomysql($d);
echo $s;
fastquery("insert into `clientrefunds` (`d1`,`clientid`,`refundamount`) values (\"$s\",$clientid,$amount)");

}

function getrefunds()
{
    $id=$_GET['clientid'];
    $res=fastqueryselect("select * from clientrefunds where clientid=".$id." order by d1 desc");
    echo "<table style=''>";
    foreach($res as $r)
    {
        drawrefund($r);
    }

?>
</table>
<table  style="<?=getStyle(100);?>;border:1px solid black;-khtml-border-radius: 4px;    border-radius: 4px;    border: 2px solid #bebebe;"><tr>
<td style="<?=getStyle(4);?>">
refund date</td> <td><input  class="std_textbox"  id="rdate" type="text"></td>
</tr>
</tr>
<td style="<?=getStyle(4);?>">
Amount of refund</td><td>
<input id="amount"  class="std_textbox"   type="text" /></td></tr>
<tr><td></td><td><input id="addrefund" value="Add refund" type="button"onclick="addrefund()" style="<?=getStyle(3)?>"> </td></tr>
</table>

<?

}
function drawrefund($r)
{
    $id=$r[id];

$d=convertdatetojs($r[d1]);

    ?>
    <tr>
        <td><input class="std_textbox" type="button" id="refunddelete<?=$id?>" style=" background: url(images/delete.png) no-repeat;width:22px;background-size: contain;display:block;" refundid="<?=$id?>" onclick="deleterefund(<?=$id?>)"></td>
        <td><input class="std_textbox" type="text" id="refunddate<?=$id?>" value="<?=$d?>"></td>
        <td><input class="std_textbox" type="text" id="refundamount<?=$id?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="display:block;" value="<?=$r[refundamount]?>"></td>
        <td><input  type="button" id="refundupdate<?=$id?>" style=" background: url(images/Refresh.png) no-repeat;width:22px;background-size: contain;" refundid="<?=$id?>"  onclick="updaterefund(<?=$id?>)"></td>

    </tr>

<?
}






//------------------------------------------------------------------------------------------------------


function getandprint($id)
{
$q="select * from `client` where id=$id";
    $in=fastqueryselect($q,1);
    //pr_dump("$q",$info);
    $info=$in[0];

    $sp=gettextbyid("sponser","id","n1",$info['sponserid']);
    $cm= gettextbyid("casemanager","id","n1",$info['casemanagerid']);

    //pr_dump("info",$info);
    $i=new Client
    (
        $info['id'],
        $sp,
        $cm ,
        $info['activeclient'],
        $info['i1'],
        $info['i2'],
        $info['i3'],
        $info['fname'],
        $info['lname'],
        $info['memberid']  ,
    $info['referralid'],
    $info['streetaddress'],
    $info['city'],
    $info['st'],
    $info['zip'],
    $info['phone'],
    $info['email'],
    $info['documentsavename'],
    $info['documentshowname'],
    $info['n1'],

    $info['n2'],
    $info['username'],
    $info['userpassword'],
    $info['n3'],
    convertdatetojs($info['joindate']),
    convertdatetojs($info['packagemailedoutdate']),
    $info['d1'],
    $info['linkid1']

    );
    //pr_dump("i",$i);
    echo json_encode($i);
}



function convertdatetomysql($fdate)
{
if($fdate)
{
    list($month,$day , $year) = sscanf($fdate, '%02d/%02d/%04d');
    $d = new DateTime("$year-$month-$day");
    return $d->format('Y-m-d');}
else
    return "2018-1-1";
}


function convertdatetojs($d)
{
//pr_dump("d",$d);
if($d)
{list( $year,$month,$day ,$hour,$minute,$second) = sscanf($d, '%d-%d-%2d');

/*pr_dump("y",$year);
pr_dump("m",$month);
pr_dump("d",$day);

pr_dump("h",$hour);
pr_dump("m",$minute);
pr_dump("s",$second);
*/
$fd = new DateTime("$year-$month-$day");
return $fd->format('m/d/Y');}
else return "1/1/2017";
}

function sendemail($title,$msg,$fromemail,$toemail)
{
    require_once("PHPMailer-master/mailer.php");
    require_once("PHPMailer-master/PHPMailerAutoload.php");

    $subject = "Sent by: " . $fromemail . "\nFrom: ZTP";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=windows-1256\r\n";
    $headers .= "From:" . $fromemail . "\r\n";

    $mData = "Client Name: ZTP <br/>\r\n";
    $mData .= "Client EMail: $toemail <br/>\r\n";


///-----------------------------------------------------
//$mData .= "file: " . htmlspecialchars($file) . "<br/>\r\n";
    //$to = "moudarkiwan@yahoo.com";


    $content = '
<html>
	<body>
		<table style="width:100%;">
		<tr>
				<td style="border:1px solid black;padding:10px">
					Message:' . $msg . '
				</td>
			</tr>

		</table>
	</body>
</html>
';
    $email = new PHPMailer();
    $email->From = $fromemail;
    $email->FromName = 'ZTP';
    $email->Subject = 'Message';
    $email->Body = $content;
    $email->IsHTML(true);
    $email->AddAddress($toemail);
//pr_dump("email",$email);
    if ($email->Send()) {
        $P_Message = "Email Sent Successfully";
    } else {
        $email->ErrorInfo();
        $P_Message = "<B class='bold red'>Email failed to send</B>";
    }
}


    function validate()
{

 $csid=getidbytext('casemanager','id','n1',$_GET[casemanagerid]);
 $spid=getidbytext('sponser','id','n1',$_GET[sponserid]);

if($csid && $csid!=null) {}
else return "case manager error";
if($spid && $spid!=null) {}
else return "sponser error";

return 1;

}