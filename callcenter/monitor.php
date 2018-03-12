<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/19/2018
 * Time: 6:21 PM
 */

include_once ("dbinit.php");

function tablehead($h)
{        echo "<tr>";foreach($h as $ht)echo "<td>$ht</td>";        echo "</tr>";

}
function tablerow($r)

{        echo "<tr>";foreach($r as $ht)echo "<td>$ht</td>";        echo "</tr>";

}

$busytime=10;
fixAgentBusyStatus();
function fixAgentBusyStatus()
{   global $busytime;
    fastquery("update `agent` set `status`=1 where `status`=2 and TIMESTAMPDIFF(MINUTE,`last_date_picked`,NOW())>$busytime");

}





if(isset($_GET['f'])&&$_GET['f']==1){
//--------------------------------------------------------------------stuff to show with each update
    echo "last update in :".date("d-m-Y h:i:s");




$res=fastquery("SELECT `agent`.`username`, `team`.`n1` as `teamn`,`availability_status`.`id` as `avid`, `availability_status`.`n1` as `st`,($busytime-TIMESTAMPDIFF(MINUTE,`agent`.`last_date_picked`,NOW()))as `avin`,`agent`.`last_lead`
FROM ((`agent` INNER JOIN `team_agent` ON `agent`.`id` = `team_agent`.`agent_id`) INNER JOIN `team` ON `team_agent`.`team_id` = `team`.`id`) INNER JOIN `availability_status` ON `agent`.`status` = `availability_status`.`id`;
");

echo "<table>";
tablehead(array("Agent","Team","Status"));



foreach($res as $r)
{
if($r['avid']==2)
    tablerow(array($r['username'],$r['teamn'],$r['st']." with ".$r['last_lead'].".back in ".$r['avin']));
else
    tablerow(array($r['username'],$r['teamn'],$r['st']));

}
echo "</table>";




   //----------------------------------stuff for auto upcate the page
}
else {?>
<script src="js/js.js"></script>
<script>
    loadContent();
    function loadContent()
    {
        myajax("monitor.php?f=1",function(resp){document.getElementById("content").innerHTML=resp;  setTimeout(1000,loadContent());},function(){alert("fail")});
    }
</script>

<div id="content"></div>

<?}