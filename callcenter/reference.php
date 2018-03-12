<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/17/2018
 * Time: 11:57 PM



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