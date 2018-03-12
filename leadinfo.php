<?php
/**
 * Created by PhpStorm.
 * User: Hazem1
 * Date: 12/23/2017
 * Time: 9:20 AM
 */

$db_config = array(
    "host" => "rdccharlie.com.mysql",
    "database" => "rdccharlie_com",
    "username" => "rdccharlie_com",
    "password" => "Bss79AVxYjxqxZ4Apsu8Qj5L"
);
$debug=true;
connect_database();
$id=$_GET["id"];
$rows=getLead($id);

//var_dump($rows);


echo "<table>";
echo "<tr><td>id</td><td>$rows[id]</td></tr>";
echo "<tr><td>resource_id</td><td>$rows[resource_id]</td></tr>";
echo "<tr><td>fname</td><td>$rows[fname]</td></tr>";
echo "<tr><td>lname</td><td>$rows[lname]</td></tr>";
echo "<tr><td>phone</td><td>$rows[phone]</td></tr>";
echo "<tr><td>email</td><td>$rows[email]</td></tr>";
echo "<tr><td>created_date</td><td>$rows[created_date]</td></tr>";
echo "</table>";

echo "<hr>data-fields<hr>";
$ss=json_decode($rows["data"]);
arraytotable($ss);
//var_dump($ss);



echo "<hr>address<hr>";

$ss1=json_decode($rows["data"]);
$ss2=$ss1->address;
arraytotable($ss2);



echo "<hr>custom<hr>";

$ss3=json_decode($rows["data"]);
$ss4=$ss3->custom_fields;
arraytotable($ss4);

?>
<button value="Send Calnely Invitation" onclick="window.location.replace('http://rdccharlie.com/basecrm/sendcalendly.php?mobile=<?=$rows[phone]?>')">Send Calnely Invitation</button>
<?


//var_dump($ss);
/*
"custom_fields":{
"Inquiry Comment":"I'm interested in 15205 N Ivory Dr Unit B",
"MLSID":"5683141",
"Bedrooms":"2",
"Bathrooms":"2",
"price_of_home":"230,000"
*/


//id=1137

//------------------------------------------------functions
function connect_database()
{
    global $db_con,$debug,$db_config;
    try {$db_con = new PDO('mysql:host=' . $db_config[
"host"] . ';dbname=' . $db_config[
"database"], $db_config[
"username"], $db_config[
"password"]);
    } catch (PDOException $e) {
        if ($debug) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die('database not connected');
        }

    }

}
function getLead($id)
{
    global $db_con;
    $sth = $db_con->prepare("SELECT * FROM leads where id=".$id);
    $sth->execute();

    //var_dump($sth);
    $rows = $sth->fetch(PDO::FETCH_ASSOC);
    if ($sth->rowCount() == 1) {
        return $rows;
    } else {
        return false;
    }
}

function arraytotable($aa)
{
    echo "<table>";
    foreach($aa as $k=>$a)

    {

        if(is_scalar($a)){
        echo "<tr><td>$k</td><td>$a</td></tr>";
    }}
    echo "</table>";
}