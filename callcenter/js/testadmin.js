



$( document ).ready(function() {


    $("#nextbtn").click(function(){        nextbtnclick()           })
    $("#pervbtn").click(function(){        pervbtnclick()           })
    $("#savebtn").click(function(){        savebtnclick()           })
    $("#addbtn").click(function(){         addbtnclick()           })
    $("#deletebtn").click(function(){      delbtnclick()           })
    $("#newbtn").click(function(){         newbtnclick()           })
    $("#searchbtn").click(function(){      searchclick()           })


init();

  //  var url = "http://www.google.com/search?site=&tbm=isch&source=hp&biw=&bih=&q=sdfg&btnG=Search+by+image"
   // imageswindow=window.open(url, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');

});
var table;
var fields;


function initsearch(t1,fields1)
{
//alert(t1);
    table=t1;
    fields=fields1;
}
//---------------------------------------------------------------------------search

function searchclick()
{

    url="infoman.php?q=search&table="+table;
    for(i=0;i<fields.length;i++)
    {

        if(fields[i]=="joindate" || fields[i]=="packagemailedoutdate"  )
        {}
        else {
            var i1 = document.getElementById(fields[i] + "check").checked;
            var i2 = document.getElementById("s" + fields[i]).value;
            url += "&" + fields[i] + "check=" + i1;
            url += "&s" + fields[i] + "=" + i2;
        }
    }


    var d = new Date(document.getElementById("sjoindate").value);
    var day = d.getDate();
    var month = d.getMonth()+1;
    var year = d.getFullYear();
    var joindate=year+"-"+month+"-"+day;

    var d2 = new Date(document.getElementById("ssjoindate").value);
    var day2 = d2.getDate();
    var month2 = d2.getMonth()+1;
    var year2 = d2.getFullYear();
    var joindate2=year2+"-"+month2+"-"+day2;





    var d1 = new Date(document.getElementById("spackagemailedoutdate").value);
    var day1 = d1.getDate();
    var month1 = d1.getMonth()+1;
    var year1 = d1.getFullYear();
    var package=year1+"-"+month1+"-"+day1;


    var d3 = new Date(document.getElementById("sspackagemailedoutdate").value);
    var day3 = d3.getDate();
    var month3 = d3.getMonth()+1;
    var year3 = d3.getFullYear();
    var package3=year3+"-"+month3+"-"+day3;



    url+="&joindatecheck=" +  document.getElementById("joindatecheck").checked;;
    url +="&sjoindate" + "=" + joindate;
    url +="&ssjoindate" + "=" + joindate2;

    url+="&packagemailedoutdatecheck=" +  document.getElementById("packagemailedoutdatecheck").checked;;
    url+="&spackagemailedoutdate" +  "=" + package;
    url+="&sspackagemailedoutdate" +  "=" + package3;

alert(url);

    myajax(url,searchback,fail);

}

function searchback(resp)
{

    hdebug(resp);
    document.getElementById("searchresults").innerHTML=resp;
}


//---------------------------------------------------------------------------------init
function init()
{

    //myajax("infoman.php?q=setdata&id="+maxnavid,setdata,fail)
}

function maxnavid(resp)
{
   //hdebug(resp);
    document.getElementById("navid").value=resp;
  //  myajax("infoman.php?q=setdata&id=" + resp, setdata, fail);

}
function setmaxandloadrecord(resp)
{
    //hdebug(resp);
    document.getElementById("navid").value=resp;
      myajax("infoman.php?q=setdata&id=" + resp, setdata, fail);

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
    var i2=document.getElementById("sponserid").value;
    var i3=document.getElementById("casemanagerid").value;
    var i4=document.getElementById("activeclient").value;
    var i5=1;//document.getElementById("i1").value;
    var i6=2;//document.getElementById("i2").value;
    var i7=3;//document.getElementById("i3").value;
    var i8=document.getElementById("fname").value;
    var i9=document.getElementById("lname").value;
    var i10=document.getElementById("memberid").value;
    var i11="";//document.getElementById("referralid").value;
    var i12=document.getElementById("streetaddress").value;
    var i13=document.getElementById("city").value;
    var i14=document.getElementById("st").value;
    var i15=document.getElementById("zip").value;
    var i16=document.getElementById("phone").value;
    var i17=document.getElementById("email").value;
    var i18='';//document.getElementById("documentsavename").value=obj['documentsavename'];
    var i19='';//document.getElementById("documentshowname").value=obj['documentshowname'];
    var i20='';//document.getElementById("n1").value=obj[''];
    var i21='';//document.getElementById("n2 ").value=obj[''];
    var i22=document.getElementById("username").value;
    var i23=document.getElementById("userpassword").value;
    var i24='';//document.getElementById("n3").value=obj[''];

    var d = new Date(document.getElementById("joindate").value);
    var day = d.getDate();
    var month = d.getMonth()+1;
    var year = d.getFullYear();
    var joindate=year+"/"+month+"/"+day;

    var d1 = new Date(document.getElementById("packagemailedoutdate").value);
    var day1 = d1.getDate();
    var month1 = d1.getMonth()+1;
    var year1 = d1.getFullYear();
    var package=year1+"/"+month1+"/"+day1;

    var i25=joindate;//document.getElementById("joindate").value;
    var i26=package;//document.getElementById("packagemailedoutdate").value;
    var i27='2/3/2018';//document.getElementById("d1").value=obj[''];
    var i28=4;//document.getElementById("linkid1"];

   var q="infoman.php?q=add"
        +"&id="+i1
        +"&sponserid="+i2
        +"&casemanagerid="+i3
        +"&activeclient="+i4
        +"&i1="+i5
        +"&i2="+i6
        +"&i3="+i7
        +"&fname="+i8
        +"&lname="+i9
        +"&memberid="+i10
        +"&referralid="+i11
        +"&streetaddress="+i12
        +"&city="+i13
        +"&st="+i14
        +"&zip="+i15
        +"&phone="+i16
        +"&email="+i17
        +"&documentsavename="+i18
        +"&documentshowname="+i19
        +"&n1="+i20
        +"&n2 ="+i21
        +"&username="+i22
        +"&userpassword="+i23
        +"&n3="+i24
        +"&joindate="+i25
        +"&packagemailedoutdate="+i26
        +"&d1="+i27
        +"&linkid1="+i28;
        myajax(q   ,added,fail);

}
function added(resp)
{
    hdebug(resp);

    if(resp!=1)
            alert("Error : "+resp);
    else
    {

    feedback("Added Successfuly")


    }
}

//===========================================save
function savebtnclick()
{



    var id=document.getElementById("navid").value;
    var i1=document.getElementById("navid").value;
    var i2=document.getElementById("sponserid").value;
    var i3=document.getElementById("casemanagerid").value;
    var i4=document.getElementById("activeclient").value;
    var i5=1;//document.getElementById("i1").value;
    var i6=2;//document.getElementById("i2").value;
    var i7=3;//document.getElementById("i3").value;
    var i8=document.getElementById("fname").value;
    var i9=document.getElementById("lname").value;
    var i10=document.getElementById("memberid").value;
    var i11="";//document.getElementById("referralid").value;
    var i12=document.getElementById("streetaddress").value;
    var i13=document.getElementById("city").value;
    var i14=document.getElementById("st").value;
    var i15=document.getElementById("zip").value;
    var i16=document.getElementById("phone").value;
    var i17=document.getElementById("email").value;
    var i18='';//document.getElementById("documentsavename").value=obj['documentsavename'];
    var i19='';//document.getElementById("documentshowname").value=obj['documentshowname'];
    var i20='';//document.getElementById("n1").value=obj[''];
    var i21='';//document.getElementById("n2 ").value=obj[''];
    var i22=document.getElementById("username").value;
    var i23=document.getElementById("userpassword").value;
    var i24='';//document.getElementById("n3").value=obj[''];


    var d = new Date(document.getElementById("joindate").value);
    var day = d.getDate();
    var month = d.getMonth()+1;
    var year = d.getFullYear();
    var joindate=year+"/"+month+"/"+day;


  //  return;
    var d1 = new Date(document.getElementById("packagemailedoutdate").value);
    var day1 = d1.getDate();
    var month1 = d1.getMonth()+1;
    var year1 = d1.getFullYear();
    var package=year1+"/"+month1+"/"+day1;

    var i25=joindate;//document.getElementById("joindate").value;
    var i26=package;//document.getElementById("packagemailedoutdate").value;
    var i27='2/3/2018';//document.getElementById("d1").value;
    var i28=4;//document.getElementById("linkid1"];

    myajax("infoman.php?q=save"
    +"&id="+i1
    +"&sponserid="+i2
    +"&casemanagerid="+i3
    +"&activeclient="+i4
    +"&i1="+i5
    +"&i2="+i6
    +"&i3="+i7
    +"&fname="+i8
    +"&lname="+i9
    +"&memberid="+i10
    +"&referralid="+i11
    +"&streetaddress="+i12
    +"&city="+i13
    +"&st="+i14
    +"&zip="+i15
    +"&phone="+i16
    +"&email="+i17
    +"&documentsavename="+i18
    +"&documentshowname="+i19
    +"&n1="+i20
    +"&n2 ="+i21
    +"&username="+i22
    +"&userpassword="+i23
    +"&n3="+i24
    +"&joindate="+i25
    +"&packagemailedoutdate="+i26
    +"&d1="+i27
    +"&linkid1="+i28
        ,saved,fail);
}
function saved(resp)
{
    hdebug(resp);
feedback("Saved Successfully");
}
//===========================================delete
function delbtnclick()

{

    var id=document.getElementById("navid").value;

    myajax("infoman.php?q=del&id="+id,deleted,fail);


}
function deleted()
{

    feedback("Deleted Successfully");
    loadlastrecord();
}
//===========================================new
function newbtnclick()
    {


        var dt = new Date();
        dt.getDate();


        myajax("infoman.php?q=maxnavid",newnavid,fail)



        document.getElementById("sponserid").value="";
        document.getElementById("casemanagerid").value="";
        document.getElementById("activeclient").value="";
        // document.getElementById("i1").value="";
        // document.getElementById("i2").value="";
        //document.getElementById("i3").value="";
        document.getElementById("fname").value="";
        document.getElementById("lname").value="";
        document.getElementById("memberid").value="";
        //document.getElementById("referralid").value="";
        document.getElementById("streetaddress").value="";
        document.getElementById("city").value="";
        document.getElementById("st").value="";
        document.getElementById("zip").value="";
        document.getElementById("phone").value="";
        document.getElementById("email").value="";
        // document.getElementById("documentsavename").value="";
        //document.getElementById("documentshowname").value="";
        //document.getElementById("n1").value="";
        //document.getElementById("n2 ").value="";
        document.getElementById("username").value="";
        document.getElementById("userpassword").value="";
        //document.getElementById("n3").value="";
        document.getElementById("joindate").value=(dt.getMonth()+1)+"/"+dt.getDate()+"/"+dt.getFullYear();
        document.getElementById("packagemailedoutdate").value=(dt.getMonth()+1)+"/"+dt.getDate()+"/"+dt.getFullYear();
        //document.getElementById("d1").value="";
        //document.getElementById("linkid1']


        //hdebug(resp);
        document.getElementById("sessions").innerHTML="";
        document.getElementById("refunds").innerHTML="";


    }
//-----------------------------------------------new
function nextbtnclick()
{

    var id=document.getElementById("navid").value;
    myajax("infoman.php?q=nextadmin&id="+id,setdata,fail)
}
function pervbtnclick()
{  var id=document.getElementById("navid").value;
    myajax("infoman.php?q=pervadmin&id="+id,setdata,fail)
}



function setdata(resp)
{
        hdebug(resp);
    obj=JSON.parse(resp);

    document.getElementById("navid").value=obj['id'];


        document.getElementById("sponserid").value=obj['sponserid'];
        document.getElementById("casemanagerid").value=obj['casemanagerid'];
        document.getElementById("activeclient").value=obj['activeclient'];
       // document.getElementById("i1").value=obj['i1'];
       // document.getElementById("i2").value=obj['i2'];
        //document.getElementById("i3").value=obj['i3'];
        document.getElementById("fname").value=obj['fname'];
        document.getElementById("lname").value=obj['lname'];
        document.getElementById("memberid").value=obj['memberid'];
        //document.getElementById("referralid").value=obj['referralid'];
        document.getElementById("streetaddress").value=obj['streetaddress'];
        document.getElementById("city").value=obj['city'];
        document.getElementById("st").value=obj['st'];
        document.getElementById("zip").value=obj['zip'];
        document.getElementById("phone").value=obj['phone'];
        document.getElementById("email").value=obj['email'];
       // document.getElementById("documentsavename").value=obj['documentsavename'];
        //document.getElementById("documentshowname").value=obj['documentshowname'];
        //document.getElementById("n1").value=obj[''];
        //document.getElementById("n2 ").value=obj[''];
        document.getElementById("username").value=obj['username'];
        document.getElementById("userpassword").value=obj['userpassword'];
        //document.getElementById("n3").value=obj[''];
    join=obj['joindate'];
    /*var d=join.getDate();
    var m=join.getMonth()+1;
    var y =join.getFullYear();
    s=d+"/"+m+"/"+y;*/
    document.getElementById("joindate").value=join;
   // alert(join);
    package=obj['packagemailedoutdate'];
    /*var d=package.getDate();
    var m=package.getMonth()+1;
    var y =package.getFullYear();
    s=d+"/"+m+"/"+y;
*/

        document.getElementById("packagemailedoutdate").value=package;
        // alert(package);
        //document.getElementById("d1").value=obj[''];
        //document.getElementById("linkid1']
        //alert(obj['image']);


    myajax("infoman.php?q=getsessions&clientid="+obj['id'],getsessionssuccessed,fail);
    myajax("infoman.php?q=getrefunds&clientid="+obj['id'],getrefundssuccessed,fail);
}

//---------------------------------------------------------------session logic
function getsessionssuccessed(resp)
{
    //hdebug(resp);
    document.getElementById("sessions").innerHTML=resp;
    $( function() {
        $("input[id^='sessiondate']").datepicker();
    } );
$( function() {
    $("#fdate").datepicker();
} );

}
function schedulesessions()
{
    var clientid=document.getElementById("navid").value;
    var count=document.getElementById("scount").value;
    var firstdate=document.getElementById("fdate").value;
    myajax("infoman.php?q=schedulesessions&clientid="+clientid+"&count="+count+"&fdate="+firstdate ,scheduled,fail);
}
function scheduled(resp)
{
    //hdebug(resp);
    myajax("infoman.php?q=getsessions&clientid="+obj['id'],getsessionssuccessed,fail);
}

function deletesession(sessionid){
    myajax("infoman.php?q=deletesession&+sessionid="+sessionid ,sessiondeleted,fail);
}
function sessiondeleted(resp)
{
    //hdebug(resp);
    myajax("infoman.php?q=getsessions&clientid="+obj['id'],getsessionssuccessed,fail);
}

function updatesession(sessionid)
{
    sdate=document.getElementById("sessiondate"+sessionid).value;
    snotes=document.getElementById("sessionnotes"+sessionid).value;
    myajax("infoman.php?q=updatesession&sessionid="+sessionid+"&sdate="+sdate+"&snotes="+snotes ,sessionupdated,fail);
}
function sessionupdated(resp)
{
    //hdebug(resp);
    myajax("infoman.php?q=getsessions&clientid="+obj['id'],getsessionssuccessed,fail);
}
//-------------------------------------------------------------------------------------------Refunds logic

//---------------------------------------------------------------session logic
function getrefundssuccessed(resp)
{
  //  hdebug(resp);
    document.getElementById("refunds").innerHTML=resp;
    $( function() {        $("input[id^='refunddate']").datepicker();    } );
    $( function() {
        $("#rdate").datepicker();
    } );

}
function addrefund()
{
    var clientid=document.getElementById("navid").value;
    var amount=document.getElementById("amount").value;
    var rdate=document.getElementById("rdate").value;
    var url="infoman.php?q=addrefund&clientid="+clientid+"&amount="+amount+"&rdate="+rdate
   // alert(url);
    myajax( url,refundadded,fail);
}
function refundadded(resp)
{
    myajax("infoman.php?q=getrefunds&clientid="+obj['id'],getrefundssuccessed,fail);
   // reloadCurrentRecord();
}

function deleterefund(refundid){
    myajax("infoman.php?q=deleterefund&+refundid="+refundid ,refunddeleted,fail);
}
function refunddeleted(resp)
{
    //hdebug(resp);
    myajax("infoman.php?q=getrefunds&clientid="+obj['id'],getrefundssuccessed,fail);
}

function updaterefund(refundid)
{
    rdate=document.getElementById("refunddate"+refundid).value;
    ramount=document.getElementById("refundamount"+refundid).value;
    myajax("infoman.php?q=updaterefund&refundid="+refundid+"&rdate="+rdate+"&ramount="+ramount ,refundupdated,fail);
}
function refundupdated(resp)
{
    //hdebug(resp);
    myajax("infoman.php?q=getrefunds&clientid="+obj['id'],getrefundssuccessed,fail);
}
//-----------------------------------------------------------------send email


function sendemail(){

    emailtitle=document.getElementById("emailtitle").value;
    emailbody=document.getElementById("emailbody").value;
    clientid=document.getElementById("navid").value;

    var url="infoman.php?q=sendemail&emailtitle="+emailtitle+"&emailbody="+emailbody+"&clientid="+clientid;
    myajaxpost(url,emailsent,fail)

}
function emailsent(resp)
{
    //hdebug(resp);
    //reloadCurrentRecord();
    feedback("Email sent Successfully")
}


function sendemailall(){

    emailtitle=document.getElementById("emailtitle").value;
    emailbody=document.getElementById("emailbody").value;
    clientid=document.getElementById("navid").value;

    var url="infoman.php?q=sendemailall&emailtitle="+emailtitle+"&emailbody="+emailbody+"&clientid="+clientid;
    myajaxpost(url,emailsentall,fail)

}
function emailsentall(resp)
{
    //hdebug(resp);
    //reloadCurrentRecord();
    feedback("Email sent To all Clients Successfully")
}

//--------------------------------------------------------------------- uploading the file
function uploadfile()
{
    //var clientid=document.getElementById("navid").value;

    var client = new XMLHttpRequest();
    var file = document.getElementById("clientdocument");
    client.open('POST', 'uploader.php', true); //?q=upload&clientid="+clientid
    client.setRequestHeader("Content-Type", "multipart/form-data");


    client.onreadystatechange = function()
    {
        if (client.readyState == 4 && client.status == 200)
        {
            fileuploaded(this.responseText);

        }
    }

    var formData = new FormData();
    formData.append("clientdocument", file.files[0]);
    //alert(formData);
    client.send(formData);  /* Send to server */


}
function fileuploaded(resp)
{
    alert(resp);
    //hdebug(resp);

//alert(resp);
}
/* Check the response status */





// ajax ====================================================================================
function myajax(url,success1,fail1)
{

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("responsetextajax="+this.responseText);

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

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("responsetextajax="+this.responseText);

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
function myajaxcross(url,success1,fail1)
{

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("responsetextajax="+this.responseText);

            success1(this.responseText);
        }
        //  else
        //{
        //{
        //    alert(this.readyState+","+this.status);
        // fail1(url);
        //  }
    };
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Access-Control-Allow-Origin",url);


    xhttp.send();
}
function fail(url)
{ alert("ajaxfailed:"+url);}



//------------------------------------------------------------ utility
function reloadCurrentRecord() {
    var id = document.getElementById("navid").value;
    myajax("infoman.php?q=setdata&id=" + id, setdata, fail);
}
function hdebug(s)
{
    //alert(s);
    var e=document.getElementById("debug");
    if(e && e!=null)
        e.style.display="block";
      e.innerHTML=s+"<br>";

}

function loadlastrecord()
{
    myajax("infoman.php?q=maxnavid",setmaxandloadrecord,fail);

}


function feedback(message)
{
    alert(message);
    $("html, body").animate({ scrollTop: 0 }, "slow");

}