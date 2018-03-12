<?php

include_once("dbinit.php");
include_once("ui.php");

$table=$_GET["table"];
//$son=$_GET["son"];
$groupid=1;
include_once("tables.php");
$a= getfields($table);
$fields=$a[0];
$labels=$a[1];




$r=fastquery("select * from `$table` where id=$groupid");
echo $r[0]['n1']." Agents : <br>";


$r=fastquery("select DISTINCT `agent`.`id`as aid,`agent`.`username` as username from  `agent`,`team_agent` where `team_agent`.`team_id`=$groupid");
//var_dump($r);
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
hselectwithids($id,$lable,$styleindex,$labelStyleIndex,$options,$ids,0,$extraAttributes="");

?>



    <button onclick='addnumber()' value='add Agent'>add Agent</button>
<?

function showdeletenumber($i)
{
    return "<button onclick='deletenumber($i)' value='delete Agent'>delete Agent</button>";
}
