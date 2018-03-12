<?
include_once("dbinit.php");
include_once("ui.php");
session_start();
if(2==3){}//$_SESSION['userID']!="23424"
else{
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="KEYWORDS" content=""/>
    <meta name="DESCRIPTION" content=""/>
    <meta name="rating" content="General"/>
    <titlel>
        Customer Management

    </titlel>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/testadmin.js"></script>

    <link rel="stylesheet" type="text/css" href="js/styles.css">
    </head>
<body style="width:97%">
<table  style="width:97%">
    <tr>
        <td>
            <input id="pervbtn" type="button" value="<">
            <input id="infoid" type="text">
            <input id="nextbtn" type="button" value=">">
        </td>

    </tr>

    <tr><td><br></td></tr>
    <tr><td><hr></td></tr>
<tr>
    <td>info
        <input type="text" id="infotext" style="width:97%"></td>


</tr>
    <tr>
        <td>details
            <input type="text" id="details" style="width:97%"></td>


    </tr>
    <tr>
        <td>keywords
            <input type="text" id="keywords" style="width:97%"></td>


    </tr>
    <tr><td><br></td></tr>
    <tr><td><hr></td></tr>
    <tr>
        <td>
            images<input type="button" id="getimages" value="Get Image" >
            <input type="text" id="image" style="width:77%"></td>

    </tr>

    <tr>
        <td>background<input type="button" id="getbacks" value="Get Background">
            <input type="text" id="background"  style="width:77%"></td>
    </tr>
    <tr><td><br></td></tr>
    <tr><td><hr></td></tr>
    <tr>
        <td><input id="savebtn" type="button" value="Save">
        <input id="addbtn" type="button" value="Add">
        <input id="delete" type="button" value="Delete"></td>
        <input id="enable24infos" type="button" value="enable24infos"></td>
    </tr>
    <tr>
        <td><div id="imagesample"></div><div id="backsample"></div></td>

    </tr>

</table>
</body>
</html>
<?}