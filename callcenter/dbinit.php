<?php

$dbuser = "ztpmysqluser";
$dbpass = @"EZpoDgaTLe\$a";
$dbname = "ztp";
$dbserver    = "localhost";
$online=2;

if($online==1){
    $dbuser = "rfgd_19107064";
    $dbpass = "QWhazemZX2123";
    $dbname = "rfgd_19107064_callcenter";
    $dbserver    = "sql100.rf.gd";
}
if($online==2){
    $dbuser = "rdccharlie_com";
    $dbpass = "Bss79AVxYjxqxZ4Apsu8Qj5L";
    $dbname = "rdccharlie_com";
    $dbserver    = "rdccharlie.com.mysql";
}
/*
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
function convertdatetomysqldfirst($fdate)
{
    if($fdate)
    {
        list($day,$month , $year) = sscanf($fdate, '%02d/%02d/%04d');
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
        //pr_dump("y",$year);
        //pr_dump("m",$month);
        //pr_dump("d",$day);

        //pr_dump("h",$hour);
        //pr_dump("m",$minute);
        //pr_dump("s",$second);

        $fd = new DateTime("$year-$month-$day");
        return $fd->format('m/d/Y');}
    else return "1/1/2017";
}*/
//=======================================================================================
//=======================================================================================
//=======================================================================================
//=======================================================================================
//=======================================================================================
////=======================================================================================   CREATION
////=======================================================================================
//=======================================================================================
function getdbconn(){
    GLOBAL $dbcon,$dbserver, $dbuser,$dbpass,$dbname;

    if ( ! $dbcon ) {$dbcon = mysqli_connect($dbserver,$dbuser,$dbpass);  }
    else{if ( !mysqli_ping( $dbcon) )$dbcon = mysqli_connect($dbserver,$dbuser,$dbpass);}

    if (! $dbcon) { return false;
    }
    if (!mysqli_select_db($dbcon,$dbname))
    {//pr_dump("con3",$dbcon);
        return false;}

    //  $sql="SET NAMES utf8";
    // mysqli_query($sql, $dbcon);

    return  $dbcon;
}
function getdbresultarray($dbres){
    $ress = array();
    for ($count=0; $r = mysqli_fetch_array($dbres); $count++)
    {  $ress[$count] = $r;   }
    return $ress;
}

function fastquery($query,$degug=0)
{

    $dbcon = getdbconn();
    //pr_dump("con",$dbcon);
    $dbres = mysqli_query( $dbcon,$query );

//   pr_dump("dbquery",$query);
// pr_dump("dbres",$dbres);

    if(!$dbres){ echo "<br>error in query : ".$query."<br>";}
    return getdbresultarray($dbres);
}
function fastquerywithlastid($query,$degug=0)
{
    $dbcon = getdbconn();
    $dbres = mysqli_query(  $dbcon,$query);
    if(!$dbres){echo "".$query;}
    return mysqli_insert_id();
}
function fastqueryselect($query,$debug=0)
{
    $dbcon = getdbconn();
//pr_dump("con",$dbcon);

//pr_dump("dbquery",$query);
    $dbres = mysqli_query( $dbcon,$query    );

//pr_dump("dbres",$dbres);



    if(!$dbres && $debug)
    {
        echo "<br>error in query : ".$query."<br>";
        echo "<script>alert('".$query."')</script>";
        return false;
    }


    $rr=getdbresultarray($dbres);
//pr_dump("rr",$rr);
    return $rr;


}

function pr($s,$v)
{
    echo "<br>$s = ".$v;
}
function pr_dump($s,$v)
{
    echo "<br>$s = ";
    var_dump($v);
}



function d1($d){if($d>0)echo"1<br>";}
function d2($d){if($d>0)echo"2<br>";}
function d3($d){if($d>0)echo"3<br>";}
function d4($d){if($d>0)echo"4<br>";}
function d5($d){if($d>0)echo"5<br>";}
function d6($d){if($d>0)echo"6<br>";}
function d7($d){if($d>0)echo"7<br>";}
function d8($d){if($d>0)echo"8<br>";}
function d9($d){if($d>0)echo"9<br>";}
function d($d){if($d>0) {}}
function spr($s,$v)
{
    ?>
    <script>alert("<?=$s?>"+" : "+'<?var_dump($v)?>');</script>

    <?
}
function addrandomdata(){    fastquery("insert into property_picture(propertyid,picturelink)values(43,'234234')");}
function listdata(){    $r=fastquery("select* from property_picture");    var_dump($r);}


function buildpropertydb()
{

//=================================================== table
    $q11="
CREATE TABLE  `property_picture` (
`id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`propertyid` int( 10 ) NOT NULL DEFAULT  1,
`picturelink` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ')
";


    $q12="
CREATE TABLE  `property` (
`id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pid` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`identifier` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`town` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`province` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`neighborhood` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`street` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`street_number` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`geo_lat` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`geo_lng` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`renting` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`selling` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`renting_cost` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`renting_period` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`selling_cost` int( 10 ) NOT NULL DEFAULT  0,
`kind` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`floor` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`bedrooms` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`bathrooms` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`area` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`description` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',

`agencyname` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencyaddress` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencytown` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencyzip_code` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencyphone_number_1` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencyphone_number_2` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencylogo` VARCHAR( 300 ) NOT NULL DEFAULT  ' ',
`agencycurrency` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`agencycurrency_symbol` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',

`status` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`is_reserved` VARCHAR( 100 ) NOT NULL DEFAULT  ' ',
`zip_code` VARCHAR( 100 ) NOT NULL DEFAULT  ' ')

";




    $r=fastquery($q11);if($r)echo "success";
//    $r=fastquery($q12);if($r)echo "success";

}


//----------------------------------------------------------------from old

function getoptions($table,$column)
{  $res = fastqueryselect("select $column from $table");

    $ret=array();
    $i=0;
    if($res)
        foreach ($res as $r)
        {
            $ret[$i++]=$r[$column];

        }

    else
        echo "errrrrrrr";
    return $ret;
}
function getmininfoid($s,$table,$value=0)
{
    GLOBAL $dbuser, $dbpass, $dbname;
    // connect to db
    $dbcon = getdbconn('localhost', $dbuser, $dbpass, $dbname);
    if (!$dbcon)
        return false;

    $qry = "SELECT " . $s . "(id) as minid FROM $table ";
    if ($value != 0 && $s == "max") {
        $qry .= " where id<" . $value ." ";
    }
    else if ($value != 0 && $s == "min")
    {
        $qry .= " where id>" . $value;
    }

    else if($value == 0 && $s == "max")
    {
        $qry .= " ";
    }
    // $qry .= " ORDER BY added_date DESC ";
    $dbres1="";
//    $dbres1 = @mysql_query( $qry);
   // if (!$dbres1)
  //      return false;
  //  $rescount = @mysql_num_rows($dbres1);
   // if ($rescount ==0)
   //     return false;
  //  $dbres1 = @mysql_fetch_array($dbres1);
$res=fastquery($qry);
    //var_dump($dbres1);
    return $res[0][0];
}
function getinfobyid($id,$table){
    GLOBAL  $dbuser,$dbpass,$dbname;
    // connect to db
    $dbcon = getdbconn('localhost',$dbuser,$dbpass,$dbname);
    if (! $dbcon)
        return false;
    $qry = "SELECT * FROM $table where id=$id";
    $dbres =fastquery($qry);
    return $dbres;
}
function getidbytext($table,$id,$textcolumn,$textvalue)
{
    $res=fastquery("select $id from $table where $textcolumn like \"$textvalue\"");
    return $res[0][$id];

}
function gettextbyid($table,$id,$textcolumn,$value)
{
    $res=fastquery("select `$textcolumn` from `$table` where `$id`=$value");
    return $res[0][$textcolumn];

}



function hpr($s,$v)
{
    pr_dump($s,$v);
}
function buildcallCentersdb()
{
    $q1="
    CREATE TABLE  `condition` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `property_min_value` INT( 10 ) NOT NULL DEFAULT  0,
 `app_name` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `Condition_Name` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `zips` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 
 `i3` INT( 10 ) NOT NULL DEFAULT  0,
`n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n2` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n3` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '

 )
";

    $q10="
    CREATE TABLE  `rule` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `order` INT( 10 ) NOT NULL DEFAULT  0,
  `condition_id` INT( 10 ) NOT NULL DEFAULT  0,
 `actionset_id` INT( 10 ) NOT NULL DEFAULT  0,
 `status` INT( 10 ) NOT NULL DEFAULT  1
 )
";

    $q2="
    CREATE TABLE  `agent` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,


 `i1` INT( 10 ) NOT NULL DEFAULT  0,
 `i2` INT( 10 ) NOT NULL DEFAULT  0,
 `i3` INT( 10 ) NOT NULL DEFAULT  0,



 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n2` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n3` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',

 `username` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `userpassword` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `fname` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `lname` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',

 `d1` DATETIME NULL ,
  `status` INT( 10 ) NOT NULL DEFAULT 1


)
";


    $q3="
    CREATE TABLE  `action` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '
)
";


    $q4="
    CREATE TABLE  `actionset` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '
)
";

    $q5="
    CREATE TABLE  `actionset_action` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

 `actionset_id` INT( 10 ) NOT NULL DEFAULT  0,
 `action_id` INT( 10 ) NOT NULL DEFAULT  0)";


    $q6="
    CREATE TABLE  `team` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `status` INT( 10 ) NOT NULL DEFAULT  1
)
";

    $q7="
    CREATE TABLE  `availability_status` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '
)
";

    $q8="
    CREATE TABLE  `team_agent` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `team_id` INT( 10 ) NOT NULL DEFAULT  0,
 `action_id` INT( 10 ) NOT NULL DEFAULT  0)";


    $q9="
    CREATE TABLE  `agent_availabletime` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `hourbeg` INT( 10 ) NOT NULL DEFAULT  0,
 `minutebeg` INT( 10 ) NOT NULL DEFAULT  0,
 `hourend` INT( 10 ) NOT NULL DEFAULT  0,
 `minuteend` INT( 10 ) NOT NULL DEFAULT  0,
 `agent_id` INT( 10 ) NOT NULL DEFAULT  0
 )";


    fastquery($q1,1);
    fastquery($q10,1);
    //fastquery($q3,1);
    // fastquery($q4,1);
    //  fastquery($q5,1);
    //  fastquery($q6,1);
    // fastquery($q7,1);
    //   fastquery($q8,1);
    // fastquery($q9,1);

}
function buildztpdb()
{

//=================================================== table
    $q="CREATE TABLE  `testtable` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `i1` INT( 10 ) NOT NULL DEFAULT  '0',
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `d1` DATETIME NULL ,
 `linkid1` INT( 10 ) NOT NULL DEFAULT  '0') ;" ;

//===================================================governs table 1
    $q1="
    CREATE TABLE  `client` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `sponserid` INT( 10 ) NOT NULL DEFAULT  0,
 `casemanagerid` INT( 10 ) NOT NULL DEFAULT  0,
 `activeclient` INT( 10 ) NOT NULL DEFAULT  1,
 `i1` INT( 10 ) NOT NULL DEFAULT  0,
 `i2` INT( 10 ) NOT NULL DEFAULT  0,
 `i3` INT( 10 ) NOT NULL DEFAULT  0,





 `fname` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `lname` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `memberid` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `referralid` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `streetaddress` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `city` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `st` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `zip` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `phone` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `email` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `documentsavename` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `documentshowname` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n2` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `username` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `userpassword` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',

 `n3` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',

 `joindate` DATETIME NULL ,
 `packagemailedoutdate` DATETIME NULL ,
 `d1` DATETIME NULL ,


 `linkid1` INT( 10 ) NOT NULL DEFAULT  '0'
)
";

    //===================================================governs table 1


    $q2="
    CREATE TABLE  `sponser` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n2` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n3` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `email` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '

)
";
///---------------------------------------------------------------------

    $q3="
    CREATE TABLE  `casemanager` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
  `n2` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
   `n3` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
`email` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '
)
";

//------------------------------------------------------------------------
    $q4="
    CREATE TABLE  `clientsessions` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `notes` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `clientid` INT( 10 ) NOT NULL DEFAULT  '0',
 `d1` DATETIME NULL

)
";

    $q5="
    CREATE TABLE  `clientrefunds` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `notes` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
 `refundamount` INT( 10 ) NOT NULL DEFAULT '0',
 `clientid` INT( 10 ) NOT NULL DEFAULT  '0',
 `d1` DATETIME NULL

)
";


    //7-	Complaintstate: id,complaintid,state,datetime,userid


    $q6="
    CREATE TABLE  `employee` (
 `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `n1` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
  `username` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
   `userpassword` VARCHAR( 1000 ) NOT NULL DEFAULT  ' ',
`email` VARCHAR( 1000 ) NOT NULL DEFAULT  ' '
)
";
    /*
    client(id ,sponserid ,casemanagerid ,activeclient ,i1 ,i2 ,i3 ,fname ,lname ,memberid ,referralid
     streetaddress ,city ,st ,zip ,phone ,email ,documentsavename ,documentshowname ,n1 ,n2
     username,userpassword ,n3 ,joindate ,packagemailedoutdate ,d1 ,linkid1)
    sponser ( id ,n1 ,n2 ,n3 ,email
    casemanager ( id ,n1,n2,n3 ,email)
    clientsessions` ( id ,notes ,n1 ,clientid ,d1)
    clientrefunds ( id ,notes ,n1 ,refundamount ,clientid ,d1);
    employee ( id ,n1,username,userpassword ,email);
    */
    //$delq="drop table `aggcom`";
    // $r=fastquery($delq);if($r)echo "success";
    // $r=fastquery($q14);if($r)echo "success";
    ////$r=fastquery($q14);if($r)echo "success";


    // $r=fastquery($q1);if($r)echo "1 success";
    // $r=fastquery($q2);if($r)echo "2 success";
    //  $r=fastquery($q3);if($r)echo "3 success";
    //  $r=fastquery($q4);if($r)echo "4 success";
    //$r=fastquery($q5);if($r)echo "5 success";
    //  $r=fastquery($q6);if($r)echo "6 success";



    // aggregateplacenames();
}
function hprjs($n,$v)
{
    echo "<script>alert(\"$n=$v\");</script>";


}
function AuthenticateUserPass($username,$password)
{
    $query = "SELECT * FROM `agent` WHERE `username` like \"$username\"";
    $result = fastqueryselect($query,1);
    if (!$result)return -1;

    $query = "SELECT * FROM `agent` WHERE `username` like \"$username\" and `userpassword` like \"$password\"";
    $result = fastqueryselect($query,1);
    if (!$result) return -2;

    return $result[0]['id'];
}
function get_user($id){
    return fastqueryselect("SELECT `n1`,`username`,`userpassword` FROM `agent` WHERE id=$id");
}
function checklogged()
{
    session_start();
    if($_SESSION['userID'])
        return $_SESSION['userID'];
    else
        return -1;
}


/*
function getdbconn($host,$user,$pass,$dbname){
    global  $dbcon,$dbserver;

    if ( ! $dbcon )  $dbcon = @mysql_connect($dbserver,$user,$pass);
    else{
        if ( !@mysql_ping( $dbcon) )    $dbcon = @mysql_connect($dbserver,$user,$pass);
    }
    if (! $dbcon)  return false;
    if (!@mysql_select_db($dbname, $dbcon))
        return false;
    $sql="SET NAMES utf8";
    mysql_query($sql, $dbcon);

    return  $dbcon;
}
function getdbresultarray($dbres){
    $ress = array();
    for ($count=0; $r = @mysql_fetch_array($dbres); $count++)
        $ress[$count] = $r;
    return $ress;
}
function fastquery($query,$debug=0)
{
    GLOBAL  $dbuser,$dbpass,$dbname;
    $dbcon = getdbconn('localhost',$dbuser,$dbpass,$dbname);
    // pr_dump("con",$dbcon);
    $dbres = mysql_query( $query, $dbcon);

    if($debug==1) pr_dump("dbquery",$query);
    if($debug==1)  pr_dump("dbres",$dbres);

    if(!$dbres&&$debug==1){ echo "<br>error in query : ".$query."<br>";}
    return getdbresultarray($dbres);
}
function fastquerywithlastid($query,$debug=0)
{
    GLOBAL  $dbuser,$dbpass,$dbname;
    $dbcon = getdbconn('localhost',$dbuser,$dbpass,$dbname);
    $dbres = mysql_query( $query, $dbcon);
    if(!$dbres){echo "".$query;}
    return mysql_insert_id();
}
function fastqueryselect($query,$debug=0)
{
    GLOBAL  $dbuser,$dbpass,$dbname;
    $dbcon = getdbconn('localhost',$dbuser,$dbpass,$dbname);
    //pr_dump("con",$dbcon);

    //pr_dump("dbquery",$query);
    $dbres = mysql_query( $query, $dbcon);

    //pr_dump("dbres",$dbres);



    if(!$dbres && $debug)
    {
        echo "<br>error in query : ".$query."<br>";
        echo "<script>alert('".$query."')</script>";
        return false;
    }


    $rr=getdbresultarray($dbres);
    //pr_dump("rr",$rr);
    return $rr;


}
function pr($s,$v)
{
    echo "<br>$s = ".$v;
}
function pr_dump($s,$v)
{
    echo "<br>$s = ";
    var_dump($v);


}
*/