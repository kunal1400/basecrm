<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/17/2018
 * Time: 5:24 PM
 
action
id	n1


actionset
id	n1

actionset_action
id	actionset_id	action_id

agent
id	i1	i2	i3	n1	n2	n3	username	userpassword	fname	lname	d1	status

agent_availabletime
id	hourbeg	minutebeg	hourend	minuteend	agent_id

availability_status
id	n1
1	Available
2	Busy
3	Disabled

rule
id	property_min_value	app_name	Rule_Name	zips	order	actionset_id	i3	n1	n2	n3	status
 	 	 	1


team
id	n1	status

team_agent
id	team_id	action_id
*/

function getfields($table){
if($table=="employee") {
    $fields=array(            0=> "n1",            1=> "username",            2=> "userpassword",            3=> "email");
    $labels=array(            0=> "Name",            1=> "User Name",            2=> "User Password",            3=> "Email");
}
if($table=="sponser")  {
    $fields=array(            0=> "n1",            1=> "email");
    $labels=array(            0=> "Name",            1=> "Email");
}
if($table=="casemanager") {
    $fields = array(0 => "n1", 1 => "email");
    $labels = array(0 => "Name", 1 => "Email");
}


    if($table=="agent") {
        $fields = array(

            0 => "fname",
            1 => "lname",
            2 => "username",
            3 => "userpassword",
            4 => "n1",
            5 => "n2"



        );
        $labels = array(
            0 => "First Name",
            1 => "Last Name",
            2 => "User Name",
            3 => "Password",
            4 => "Number",
            5 => "Email"
        );

    }




    if($table=="condition1") {
        $fields = array(

            0 => "Condition_Name",
            1 => "property_min_value",
            2 => "zips",
            3 => "app_name",
        );
        $labels = array(
            0 => "Condition Name",
            1 => "property min value",
            2 => "zips",
            3 => "app name",
        );

    }
    if($table=="team")  {
        $fields=array(            0=> "n1");
        $labels=array(            0=> "Name");
    }



        if($table=="team_agent")  {
            $fields=array(            0=> "team_id",1 => "action_id");
            $labels=array(            0=> "team_id",1 => "action_id");
        }

return array($fields,$labels);
}