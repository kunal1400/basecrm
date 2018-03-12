<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/20/2018
 * Time: 10:44 AM
 */



include_once ("dbinit.php");

$requestinfo = isset($_REQUEST['arr']) ? json_decode($_REQUEST['arr']) : array();
$requestinfo=(array)$requestinfo;
var_dump($requestinfo);

//for($i=0;$i<100;$i++){oneloop(); sleep(4);}
oneloop();

function oneloop()
{
global $requestinfo;

    $requestinfo['appname'] =strtolower($requestinfo['appname']);


$rulesres=fastquery("SELECT `rule`.`id`,`rule`.`order`, `condition1`.`app_name`, `condition1`.`property_min_value`, `condition1`.`Condition_Name`, `condition1`.`zips`, `rule`.`actionset_id`, `rule`.`status`, `rule`.`target_id`, `rule`.`target_type`
FROM `rule` ,`condition1` where `rule`.`condition_id` = `condition1`.id order by `rule`.`order`");

    $set=0;
foreach($rulesres as $r )
{
$r['app_name']=strtolower($r['app_name']);
$app=0;
$zip=0;
$pv=0;

if($r['status']==1)
{
pr("state=",$r['status']);
        if ((strlen(trim($r['app_name']) )<2)  )$app=1;
        if ( strpos( $r['app_name'], $requestinfo['appname']) !== false)$app=1;
        if ( strlen(trim($r['zips']) )<3) $zip=1;
        if ( strpos($r['zips'], $requestinfo['zip']) !== false)$zip=1;
        if ( $requestinfo['pv']>$r['property_min_value'] ) {$pv=1;}

    pr("app",$app);
    pr("zip",$zip);
    pr("pv",$pv);
 if($zip>0&&$app>0&& $pv>0)    {   echo "rule that applies is the array with number ".$r['order'];
        $set=1;
     applyrule($r['id']);
        break;}
}

}


if($set==0) "no rule applied";
}



function applyrule($ruleid)
{

    $rulesres=fastquery("SELECT `rule`.`order`, `rule`.`actionset_id`,  `rule`.`target_id`, `rule`.`target_type`
FROM `rule`  where `rule`.`id` = $ruleid");

    if($rulesres[0]['target_type'] ==1)
    {
        $teamres=fastquery("select * from team where id=".$rulesres[0]  ['target_id']);

        $teamid=$teamres[0]['id'];
        $teamstatus=$teamres[0]['status'];
        if($teamstatus==1)
        {
            $agentres=fastquery("SELECT `agent`.`id`, `agent`.`status` FROM `team`,`team_agent`,`agent` where `team`.`id` = `team_agent`.`team_id` and `team_agent`.`agent_id` = `agent`.`id` and `team`.`id`=".$teamid);
            foreach($agentres as $a)
            {
                if($a['status']==1) {assignLeadToAgent($a['id']);break;}
            }
        }

    }
    if($rulesres[0]['target_type'] ==2)
    {

            $agentres=fastquery("SELECT `agent`.`id`, `agent`.`status` FROM `agent` where `agent`.`id`=".$rulesres[0]  ['target_id']." order by `last_date_picked` asc");
            foreach($agentres as $a)
            {
                if($a['status']==1) assignLeadToAgent($a['id']);
            }
    }

}

function doAction($actionid)
{



}


function assignLeadToAgent($aid)
{
    global $requestinfo;
    fastquery("update `agent` set `last_date_picked`=now() ,`last_lead`=\"".$requestinfo['lname']."\",status=2 where `agent`.`id`=".$aid,1);
    $agentres=fastquery("SELECT `agent`.`id`, `agent`.`status` FROM `agent` where `agent`.`id`=".$aid." order by `last_date_picked` asc");
    foreach($agentres as $a)
    {
      var_dump($agentres);
    }
}