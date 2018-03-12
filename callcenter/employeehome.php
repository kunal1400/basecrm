<?php
include_once("ui.php");

//hlink($id,$label,$styleindex,$labelStyleIndex,$url,$extraAttributes="");
?><div style="text-align: center;">
    <div style="font-size:40px;padding-top:30px;padding-bottom: 40px;;"> Employee Home
<?
hlink("clientman","Client Management",7,7,"cm.php");
hlink("employeeman","Sponsers Management",7,7,"entity.php?table=sponser");
hlink("employeeman","Case Managers Management",7,7,"entity.php?table=casemanager");
?>
    </div></div>

<?

