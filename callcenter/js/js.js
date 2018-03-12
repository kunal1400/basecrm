




//---------------------------------------------------------------------------------init
var table;
var fields;

function init(t1,fields1)
{

    table=t1;
    fields=fields1;

    //myajax("man.php?q=maxnavid&table="+table,maxnavid,fail);
   // navid=document.getElementById("navid").value;
   // myajax("man.php?q=setdata&id="+navid+"&table="+table,setdata,fail)
    $("#nextbtn").click(function(){        nextbtnclick()           })
    $("#pervbtn").click(function(){        pervbtnclick()           })
    $("#savebtn").click(function(){        savebtnclick()           })
    $("#addbtn").click(function(){        addbtnclick()           })
    $("#deletebtn").click(function(){        delbtnclick()           })
    $("#newbtn").click(function(){        newbtnclick()           })
    loadlastrecord();



}

function init2()
{


}




function maxnavid(resp)
{
   //hdebug(resp);
    document.getElementById("navid").value=resp;
}
function newnavid(resp)
{
    //hdebug(resp);
    document.getElementById("navid").value=parseInt(resp)+1;
}

//----------------------------------------------------------------------------------add
function addbtnclick()
{
    var id=document.getElementById("navid").value;
    var i1=document.getElementById("navid").value;

    url="man.php?q=add&table="+table+"&id="+id;
    for(i=0;i<fields.length;i++)
    {
        var i8=document.getElementById(fields[i]).value;
        url+="&"+fields[i]+"="+i8;
    }

    myajax(url,added,fail);

}
function added(resp)
{
    hdebug(resp);
feedback("Added Successfuly");
}

//===========================================save
function savebtnclick()
{
    //alert("save");
    var id=document.getElementById("navid").value;
    var i1=document.getElementById("navid").value;

    url="man.php?q=save&table="+table+"&id="+id;
for(i=0;i<fields.length;i++)
{
    var i8=document.getElementById(fields[i]).value;
    url+="&"+fields[i]+"="+i8;
}

    //alert("url");
    myajax(url,saved,fail);
}
function saved(resp)
{
    hdebug(resp);
    feedback("Saved Successfuly");
}
//===========================================delete
function delbtnclick()

{

    var id=document.getElementById("navid").value;

    url="man.php?q=del&table="+table+"&id="+id;
    myajax(url,deleted,fail);
hdebug(url);

}
function deleted()
{
  //  alert("deleted");
    feedback("Deleted Successfuly");
    loadlastrecord();
}
//===========================================new
function newbtnclick()
    {
        var dt = new Date();
        dt.getDate();

        myajax("man.php?q=maxnavid&table="+table+"",newnavid,fail)

        for(i=0;i<fields.length;i++)
        {
            document.getElementById(fields[i]).value="";
        }
    }
//-----------------------------------------------new
function nextbtnclick()
{
    //alert("next");
    var id=document.getElementById("navid").value;
    myajax("man.php?q=nextadmin&table="+table+"&id="+id,setdata,fail)

}
function pervbtnclick()
{

    var id=document.getElementById("navid").value;
    myajax("man.php?q=pervadmin&table="+table+"&id="+id,setdata,fail)
}



function setdata(resp)
{
    hdebug(resp);
    obj=JSON.parse(resp);
    document.getElementById("navid").value=obj['id'];


    //for(i=1;i<fields.length;i++)
    //{
//alert(obj.p1);

 //   alert( document.getElementById(""+  fields[0]));
    for(i=0;i<obj.p.length;i++)
    {
        document.getElementById(fields[i]).value=obj.p[i];

   }
    if(table=="team")    {getteampanel(obj['id']);    }

}

//---------------------------------------------------------------session logic




// ajax ====================================================================================
function myajax(url,success1,fail1)
{
hdebug(url);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("1111responsetextajax="+this.responseText);

                success1(this.responseText);
            }
          //  else
            //{
            //    alert(this.readyState+","+this.status);
            // fail1(url);
          //  }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
}
function myajaxpost(url,success1,fail1)
{
    hdebug(url);
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("11111responsetextajax="+this.responseText);

            success1(this.responseText);
        }
        //  else
        //{
        //    alert(this.readyState+","+this.status);
        // fail1(url);
        //  }
    };
    xhttp.open("POST", url, true);
    xhttp.send();
}
function fail(url)
{
//    alert("ajaxfailed:"+url);
}



//------------------------------------------------------------ utility

function hdebug(s)
{
   // alert(s);

    var e=document.getElementById("debug");
    if(e!=null)
        e.innerHTML+=s+"<br>";

}

function reloadCurrentRecord()
{
    var id=document.getElementById("navid").value;

    myajax("man.php?q=setdata&table="+table+"&id="+id,setdata,fail)

}

function loadlastrecord()
{
    myajax("man.php?q=maxnavid&table="+table+"",setmaxandloadrecord,fail)
}


function setmaxandloadrecord(resp)
{
    //hdebug(resp);
    document.getElementById("navid").value=resp;
    myajax("man.php?q=setdata&table="+table+"&id=" + resp, setdata, fail);

}

function feedback(message)
{
    alert(message);

}

function getteampanel( id)
{


    myajax("man.php?q=getteampanel&table=team&id="+id, teampanel, fail);


}
function teampanel(resp)
{
    document.getElementById("team_agentspanel").innerHTML=resp;
}

//------------------------------------------for multiple
function deletenumber(i)
{id=document.getElementById("navid").value;
    myajax("man.php?q=deleteagent&agentid="+i+"&id="+id+"&table=team");
    reloadCurrentRecord();
}
function addnumber()
{
    newnumber=document.getElementById("newnumber").value;
    myajax("man.php?q=addnumber&number="+newnumber+"&groupid=<?=$_GET[id]?>");
    reloadCurrentRecord();
}
function addteamagent(){
    agentid=document.getElementById("agentselect").value;
    id=document.getElementById("navid").value;
    alert(agentid);
    myajax("man.php?q=addagent&teamid="+id+"&agentid="+agentid,function(resp){reloadCurrentRecord();},fail);

}