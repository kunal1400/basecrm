<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/18/2018
 * Time: 7:11 PM
 */
include_once ("dbinit.php");
include_once ("ui.php");
$rows=fastquery("SELECT `rule`.`id`,`rule`.`order`, `condition1`.`Condition_Name`, `actionset`.`n1`, `rule`.`status`
FROM `rule`,`condition1`,`actionset` where
`rule`.`condition_id` = `condition1`.`id` and `rule`.`actionset_id` = `actionset`.`id`
 ");

//"`rule`.`id`,`rule`.`order`, `condition1`.``, `actionset`.`n1`, `rule`.`status`
//FROM `rule`,`condition1`,`actionset` where
//`rule`.`condition_id` = `condition1`.`id` and `rule`.`actionset_id` = `actionset`.`id`
 //");
$conres=fastquery("SELECT * from condition1");
$conds=array();$conids=array();
foreach($conres as $con) {   array_push($conds,$con['Condition_Name']);    array_push($conids,$con['id']);}

$teamres=fastquery("SELECT * from team");
$agentres=fastquery("SELECT * from agent");
$targets=array();$targetids=array();
foreach($teamres as $con) {   array_push($targets,$con['n1']);   }
foreach($agentres as $con) {   array_push($targets,$con['username']);   }
//var_dump($rows);die();



$actionsetres=fastquery("SELECT * from actionset");
$actionsets=array();$actionsetids=array();
foreach($actionsetres as $con) {   array_push($actionsets,$con['n1']);    array_push($actionsetids,$con['id']);}



?>
<table>
    <tr>
<td>#</td>
<td>Enabled</td>
<td>rule</td>
<td>Target a/t</td>
<td>Action Set</td></tr>
   <?
   for($i=0;$i<sizeof($rows);$i++){
   $r=$rows[$i];
       ?>
       <tr>
           <td><?=$r['order']?></td>
<td>
    <input class='std_textbox' type='checkbox' id='status<?=$r['id']?>' style='display:inline;padding: 3px;' <? if($r['status']==1 )echo "checked";?>>

</td>

<td><?

    hselectwithidspure("rule".$r['id'],"",1,1,$conds,$conids,$conds[0])?></td>
<td><?
    hautocomplete("target".$r['id'],"",1,1,$targets,"");


    ?></td>
<td><?



    hselectwithidspure("rule".$r['id'],"",1,1,$actionsets,$actionsetids,$actionsets[0])?></td>

    ?></td></tr>

       <?
   }
   ?>


</table>
