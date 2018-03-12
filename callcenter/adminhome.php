<?php
include_once("ui.php");

//hlink($id,$label,$styleindex,$labelStyleIndex,$url,$extraAttributes="");

?><div style="text-align: center;">
    <div style="font-size:40px;padding-top:30px;padding-bottom: 40px;;"> Admin Home
        <?
     /*   hlink("employeeman","Agent Management",7,7,"entity.php?table=agent");
        hlink("clientman","Team Management",7,7,"entity.php?table=team");
        hlink("ruleman","Rule Management",7,7,"entity.php?table=rule");
        hlink("monitorlead","Monitor Last Leads",7,7,"monitor.php");
       */ ?>
    </div></div>
    <style>
        .body1
        {
            background-color:rgba(120, 120, 120, 0.3);
        }
        .div1
        {
            padding:20px;
        }
        .div2
        {  padding:15px;
            background-color:rgba(100, 100, 100, 0.3);
            width: 100%;

        }
        .div3
        {  padding:30px 15px ;

        }
        .div4
        {
            margin:0 auto;
            align:center;
            padding:10px ;
            border: 1px solid #aaa;
            background-color:rgba(100, 100, 100, 0.3);
            width: 320px;
            height: 75px;
        }

        .btn-group .button {
            background-color:rgba(0, 0, 0,0.9);
            border: 1px solid #aaa;
            color: white;
            padding: 5px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            float: left;
        }
        .btn-group .button:not(:last-child) {
            border-right: none; /* Prevent double borders */
        }
        .btn-group .button:hover {
            background-color: rgba(0, 0, 0,0.4);
        }

        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #aaa;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: rgba(0,0,255,0);}

        #customers tr:hover {background-color: rgba(0,0,255,0);}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: rgba(0,0,0,0.9);
            color: white;
        }

        .btn-group1 .button {
            align:center;
            background-color:rgba(0, 0, 0,0.9);
            border: 1px solid #aaa;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            cursor: pointer;
            float: left;
        }
        .btn-group1 .button:not(:last-child) {
            border-right: none; /* Prevent double borders */
        }
        .btn-group1 .button:hover {
            background-color: rgba(0, 0, 0,0.4);
        }

    </style>

    <html lang="en" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body class="body1 ">

            <div class="btn-group" style="width:100%;">
                <a href="entity.php?table=agent" class="button"><i class="glyphicon glyphicon-user"></i>Agent Management</a>
                <a href="entity.php?table=team"  class="button"><i class="glyphicon glyphicon-user"></i>Team Management</a>
                <a href="entity.php?table=rule" class="button"><i class="glyphicon glyphicon-user"></i>Rule Management</a>
                <a href="monitor.php"  class="button"><i class="glyphicon glyphicon-user"></i>Monitor Last Leads</a>
            </div>

<?

