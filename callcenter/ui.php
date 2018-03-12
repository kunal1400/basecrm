<?php

$styles=array();

$styles[0]=";padding:10px;margin:10px;";
$styles[1]="";
$styles[2]="text-align: right; padding-right: 10px;";
$styles[3]="background: none repeat scroll 0 0 #065f8e;    border: 1px solid #004f7e;    color: #fff;     font-size: 14px;    margin: 28px auto 0;    padding: 8px 15px;    text-align: center;";
$styles[4]=" padding-left: 10px; padding-right: 10px;";
$styles[5]="border:red;";
$styles[6]="    margin: 2px 0;
    -khtml-border-radius: 4px;
    border-radius: 4px;
    border: 2px solid #bebebe;
    background-color: #fff;
    color: #000;
    font-family: 'Open Sans',sans-serif;
    font-size: 13px;
        text-rendering: auto;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;";
$styles[7]="    background: none repeat scroll 0 0 #065f8e;    border: 1px solid #004f7e;    color: #fff;    font-size: 20px;    margin: 28px auto 0;    padding: 8px 15px;    text-align: center;    text-decoration: none;";
$styles[8]="border:red;";
$styles[9]="border:red;";
$styles[10]="border:red;";
$styles[11]="border:red;";
$styles[12]="border:red;";
$styles[100]="padding:30px;margin:50px;";


function ss($i)
{
    global $styles;
    return "style=\";".$styles[$i].";;\"";

}

function getStyle($i)
{
    global $styles;
    if(!$styles[$i])
        return "";
return ";".$styles[$i].";";

}
function input($id,$label,$styleindex,$labelStyleIndex,$inputtype,$extraAttributes="",$search=0,$date=0)
{
$prefix=""; if($search==1){$prefix="s";}

echo "<tr>
";

if($search==1)  echo"<td><input type='checkbox' id='$id"."check' ></td>";

echo"<td style='".getStyle($labelStyleIndex)."'>$label</td>
<td><input class='std_textbox' type='$inputtype' id='$prefix$id' style='display:inline;padding: 3px;;".getStyle($styleindex)."' $extraAttributes>";
if($date==1) echo "<td><input class='std_textbox' type='$inputtype' id='s$prefix$id' style='display:inline;padding: 3px;;".getStyle($styleindex)."' $extraAttributes></td>";
echo "</td>
</tr>";
//<a id='$id'' herf='$url' style='$styles[$styleindex,$labelStyleIndex,]'>$label </a>";
}
function inputinvisible($id,$label,$styleindex,$labelStyleIndex,$inputtype,$extraAttributes="",$search=0,$date=0)
{
    $prefix=""; if($search==1){$prefix="s";}

    //echo "<tr>";

    if($search==1)  echo"<td><input style='display:none;' type='checkbox' id='$id"."check' ></td>";

    echo"<td style='display:none;".getStyle($labelStyleIndex)."'>$label</td>
<td><input class='std_textbox' type='$inputtype' id='$prefix$id' style='display:none;;".getStyle($styleindex)."' $extraAttributes>";
    if($date==1) echo "<td><input class='std_textbox' type='$inputtype' id='s$prefix$id' style='display:none;;".getStyle($styleindex)."' $extraAttributes></td>";
    echo "</td>
</tr>";
//<a id='$id'' herf='$url' style='$styles[$styleindex,$labelStyleIndex,]'>$label </a>";
}

function hlink($id,$label,$styleindex,$labelStyleIndex,$url,$extraAttributes="")
{
    global $styles;

    echo "<div><br><a id='$id' href='$url' style='".getStyle($styleindex)."'>$label </a></div>";


}
function hlinkimg($id,$label,$styleindex,$labelStyleIndex,$url,$imgsrc,$extraAttributes="")
{
    global $styles;
    echo "<div><br><a id='$id' href='$url' ><div style='".getStyle($styleindex).";height:100px;'><img src='$imgsrc' style='width:100px;height:100px;'><div style='display:inline;'>$label </div></div></a></div>";
}
function hbutton($id,$lable,$styleindex,$extraAttributes="")
{
    echo "<tr><td></td><td><input type='button' ".$extraAttributes." id='$id' value='$lable' style='".getStyle($styleindex)."' ></td></tr>";
}
function searchcheck()
{


}
function htext($id,$lable,$styleindex,$labelStyleIndex,$extraAttributes="",$search=0){
    //$prefix=""; if($search==1){input($id+"check","",0,0,"checkbox");$prefix="s";}
    input($id,$lable,$styleindex,$labelStyleIndex,"text","",$search);
}
function hselect($id,$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="",$search=0)
{
        $prefix=""; if($search==1){$prefix="s";}
        // if($defaultvalue!="noothing")  echo "defaultvalue=".$defaultvalue;
        if($search==1)  echo"<input type='checkbox' id='$id"."check'>";
        $optionsinput = "<select id='$prefix$id' name='example' style='".getStyle($styleindex)."' $extraAttributes>";
        for ($i = 0; $i < sizeof($options); $i++)
        {
            $s=$options[$i];
            $ff="";if($s==$defaultvalue) $ff="selected";
            $optionsinput .=  "<option value='$s' $ff>$s</option>";
        }
        $optionsinput .= "</select>";
   echo "<tr>
<td style='".getStyle($labelStyleIndex)."'>$lable</td>
<td >$optionsinput</td>
</tr>";

}
function hselectwithids($id,$lable,$styleindex,$labelStyleIndex,$options,$ids,$defaultvalue,$extraAttributes="",$search=0)
{
    $prefix=""; if($search==1){$prefix="s";}
    // if($defaultvalue!="noothing")  echo "defaultvalue=".$defaultvalue;
    if($search==1)  echo"<input type='checkbox' id='$id"."check'>";
    $optionsinput = "<select id='$prefix$id' name='example' style='".getStyle($styleindex)."' $extraAttributes>";
    for ($i = 0; $i < sizeof($options); $i++)
    {
        $s=$options[$i];
        $ff="";if($s==$defaultvalue) $ff="selected";
        $optionsinput .=  "<option value='$ids[$i]' $ff>$s</option>";
    }
    $optionsinput .= "</select>";
    echo "<tr>
<td style='".getStyle($labelStyleIndex)."'>$lable</td>
<td >$optionsinput</td>
</tr>";

}
function hselectwithidspure($id,$lable,$styleindex,$labelStyleIndex,$options,$ids,$defaultvalue,$extraAttributes="",$search=0)
{
    $prefix=""; if($search==1){$prefix="s";}
    // if($defaultvalue!="noothing")  echo "defaultvalue=".$defaultvalue;
    if($search==1)  echo"<input type='checkbox' id='$id"."check'>";
    $optionsinput = "<select id='$prefix$id' name='example' style='".getStyle($styleindex)."' $extraAttributes>";
    for ($i = 0; $i < sizeof($options); $i++)
    {
        $s=$options[$i];
        $ff="";if($s==$defaultvalue) $ff="selected";
        $optionsinput .=  "<option value='$ids[$i]' $ff>$s</option>";
    }
    $optionsinput .= "</select>";
    echo "$optionsinput";

}
function hdate($id,$lable,$styleindex,$labelStyleIndex,$extraAttributes="",$search=0,$date=0)
{
    $prefix=""; if($search==1){$prefix="s";}

    input($id,$lable,$styleindex,$labelStyleIndex,"text",$extraAttributes,$search,$date);

    ?><script>
$( function() {
    $( "#<?=$prefix.$id?>" ).datepicker();
} );
    <?if($date==1)
    {
    ?>
$( function() {
    $( "#<?="s".$prefix.$id?>" ).datepicker();
} );

    <?}?>
    </script><?

}
function hautocomplete($id,$lable,$styleindex,$labelStyleIndex,$options,$defaultvalue,$extraAttributes="",$search=0)
{
    $prefix=""; if($search==1){$prefix="s";}
    inputpure($id,$lable,$styleindex,$labelStyleIndex,"text",$extraAttributes,$search);

    ?>


<script>
    var options<?=$prefix.$id?> = [
    <?
    $first=1;
    foreach($options as $o)
    {
        if($first!=1)echo ",";
        else $first=2;
        echo"'$o'";
    }    ?>  ];
    $( "#<?=$prefix.$id?>" ).autocomplete({
            source: options<?=$prefix.$id?>,
            minLength: 1,
            select: function (event, ui) {
    //event.preventDefault();
    //var selectedObj = ui.item;
} });
</script>
<?
}
function inputpure($id,$label,$styleindex,$labelStyleIndex,$inputtype,$extraAttributes="",$search=0,$date=0)
{
    $prefix=""; if($search==1){$prefix="s";}



    if($search==1)  echo"<input type='checkbox' id='$id"."check' >";

    echo"$label
<input class='std_textbox' type='$inputtype' id='$prefix$id' style='display:inline;padding: 3px;;".getStyle($styleindex)."' $extraAttributes>";
    if($date==1) echo "<input class='std_textbox' type='$inputtype' id='s$prefix$id' style='display:inline;padding: 3px;;".getStyle($styleindex)."' $extraAttributes>";

//<a id='$id'' herf='$url' style='$styles[$styleindex,$labelStyleIndex,]'>$label </a>";
}
function hcheckbox($id,$lable,$styleindex,$labelStyleIndex,$extraAttributes="")
{
    input($id,$lable,$styleindex,$labelStyleIndex,"checkbox");

}


