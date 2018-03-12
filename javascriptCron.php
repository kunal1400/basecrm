<?php
if(isset($_GET["s"])&&$_GET["s"]==1)
{
//require_once "include13.php";
//$rdc = new rdc();
//$rdc->run_one_email_loop();
//    $rdc->testvcardkelly("somezip");

file_put_contents("output.txt","smart");

$now = new DateTime();
echo "<br>last update : ".$now->format('Y-m-d H:i:s');
//echo "<br>".$now->getTimestamp();

}
else {

?>
    <script>

        function myajax(url, success1, fail1) {

            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("responsetextajax=" + this.responseText);

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

        function succ(resp) {

            document.getElementById("result").innerHTML = resp;

        }

        function fail(resp) {
        }
        function beginloop() {
            myajax("javascriptCron.php?s=1", succ, fail);
            setTimeout(beginloop, 600000);
        }
    </script>
    <body onload="beginloop()">
    <div id="result"></div>
    </body>
  <?php

}