<?php
include_once("dbinit.php");
include_once("ui.php");
include_once("bussiness/obj.php");
session_start();
header ('Content-type: text/html; charset=utf8');

/*
$table=$_GET['table'];
if($table=="employee")
    $fields=array(
        0=> "n1",
        1=> "username",
        2=> "userpassword",
        3=> "email"

    );
*/

$table=$_GET["table"];


include_once("tables.php");
$a= getfields($table);
$fields=$a[0];
$labels=$a[1];



if($_GET['q']=="add") {


 $q="insert into `$table`(";
    $v=") values( ";
$first=1;
    foreach($fields as $f)
    {if($first==1)$first=2; else {$q.=",";$v.=",";}
        $q.="`$f`";
        $v.="\"$_GET[$f]\"";

    }


   // pr_dump("query",$q);
fastquery($q.$v.")",1);

  }
else if($_GET['q']=="save") {

   // $csid=getidbytext('casemanager','id','n1',$_GET['casemanagerid']);
   // $spid=getidbytext('sponser','id','n1',$_GET['sponserid']);


    //$joindate=-11-22 12:45:34//2014-11-22 12:45:34

//echo $csid;
  //  echo "<br>".$spid;

    $q="update `$table` set ";
    $first=1;
    foreach($fields as $f)
    {if($first==1)$first=2; else {$q.=",";$v.=",";}
        $q.=" `$f`=\"$_GET[$f]\" " ;
    }



$q.=" where id=$_GET[id]";

//hprjs("q",$q);
    fastquery($q,1);


}
else if($_GET['q']=="maxnavid") {$max=getmininfoid("max","$_GET[table]");echo $max; }
else if($_GET['q']=="del") {fastquery("delete from `$_GET[table]` where id=$_GET[id]");}

else if($_GET['q']=="nextadmin") {$id1=getmininfoid("min",$_GET['table'],$_GET['id']);   if($id1!=false){getandprint($id1);}       }
else if($_GET['q']=="pervadmin") {$id1=getmininfoid("max",$_GET['table'],$_GET['id']);   if($id1!=false){getandprint($id1);}        }
else if($_GET['q']=="setdata") {$id1=$_GET['id'];   if($id1!=false){getandprint($id1);}        }
//-------------------------------------------Session logic
else if($_GET['q']=="deletenumber"){fastquery("delete from `groupnumbers` where `id`=$_GET[numberid]");}
else if($_GET['q']=="addnumber"){fastquery("insert into `groupnumbers`(`groupid`,`number`) values($_GET[groupid],\"$_GET[number]\")");}

else if($_GET['q']=="deleteagent"){

  //  echo "here";
    $id=$_GET['id'];
    $agentid= $_GET['agentid'];
    $quer="delete from `team_agent` where `team_id`=$id and `agent_id`=$agentid";
    fastquery($quer);
//echo "$quer";


}
else if($_GET['q']=="addagent"){
    //man.php?q=addagent&teamid="+id+"&agentid="+agentid
    fastquery("insert into `team_agent`(`team_id`,`agent_id`) values($_GET[teamid],$_GET[agentid])");}

else if($_GET['q']=="getteampanel"){



    $table=$_GET["table"];
//$son=$_GET["son"];

    include_once("tables.php");
    $a= getfields($table);
    $fields=$a[0];
    $labels=$a[1];

$id=$_GET["id"];

$query="select * from `$table` where id=$id";
    $r=fastquery($query);
    //var_dump($query);
  //  var_dump($r);die();
    echo $r[0]['n1']." Agents : <br>";
    $r=fastquery("select DISTINCT `agent`.`id`as aid,`agent`.`username` as username from  `agent`,`team_agent` where `team_agent`.`team_id`=$id and `Agent`.`id`=`team_agent`.`agent_id`");
    var_dump($r);
    echo "<table>";

    foreach($r as $i)
    {
        echo "<tr>";
        echo "<td>".$i['username']."</td><td>".showdeletenumber($i['aid'])."</td>";
        echo "</tr>";
    }
    ?>
    </table>
    <?

    $r=fastquery("select `agent`.`id` as aid ,`agent`.`username` as username from  `agent`");
    $options=array();
    $ids=array();
    foreach($r as $rr) {
        array_push($options,$rr['username']);
        array_push($ids,$rr['aid']);}

    $styleindex=4;
    $labelStyleIndex=4;
    $lable="";;
    hselectwithids("agentselect",$lable,$styleindex,$labelStyleIndex,$options,$ids,0,$extraAttributes="");

    ?>



    <button  value='add Agent' onclick="addteamagent();">add Agent</button>
    <?

}

function showdeletenumber($i)
{
    return "<button onclick='deletenumber($i)' value='delete Agent'>delete Agent</button>";
}


//-------------------------------------------refund logic
//-------------------------------------------------------------------------------refund functions
//------------------------------------------------------------------------------------------------------


function getandprint($id)
{
    global $table;//=$_GET['table'];
    global $fields;
   /* if($table=="employee")    $fields=array(            0=> "id",            1=> "n1",            2=> "username",            3=> "userpassword",    4=> "email"        );
    if($table=="sponser")     $fields=array(            0=> "id",            1=> "n1",            2=> "email"       );
    if($table=="casemanager") $fields=array(            0=> "id",            1=> "n1",           2=> "email"        );
   */
    array_unshift($fields,"id");
   $q="select ";
    $first=1;
    foreach($fields as $f)
{
    if($first==1)$first=2; else {$q.=",";}
    $q.="`$f`";
}
    $q.= " from $_GET[table] where id=$id";
    //hpr("q",$q);
    $in=fastqueryselect($q);

    $info=$in[0];
   // hpr("nfo",$info);
    if($table=="employee")  $i=new obj($info[$fields[0]]  ,$info[$fields[1]] ,$info[$fields[2]] ,$info[$fields[3]] ,$info[$fields[4]] ,"","","","","");
    if($table=="sponser")  $i=new obj($info[$fields[0]]  ,$info[$fields[1]] ,$info[$fields[2]],"","" ,"","","","","");
    if($table=="casemanager")  $i=new obj($info[$fields[0]]  ,$info[$fields[1]] ,$info[$fields[2]],"","" ,"","","","","");
    if($table=="agent") {
        $i = new obj($info[$fields[0]], array($info[$fields[1]], $info[$fields[2]], $info[$fields[3]], $info[$fields[4]], $info[$fields[5]], $info[$fields[6]]), array());
    } if($table=="team")  {$i=new obj($info[$fields[0]],array($info[$fields[1]]),array());}
    if($table=="condition1")  {$i=new obj($info[$fields[0]],array($info[$fields[1]], $info[$fields[2]], $info[$fields[3]], $info[$fields[4]]),array());

        }
    //pr_dump("i",$i);
    echo json_encode($i);
}



function convertdatetomysql($fdate)
{
if($fdate)
{list($month,$day , $year) = sscanf($fdate, '%02d/%02d/%04d');
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


    //--------------------------------------------------------------- receive file
