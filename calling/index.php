<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//require_once "vendor/autoload.php";
include "../vendor/autoload.php";
    use Twilio\Rest\Client;
    use Twilio\Jwt\ClientToken;
    
    // Step 2: Set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "ACfd5e34ad10ec64d0ab97c7c43202c686";
    $AuthToken = "b8931b8dd4db63aba48be24435dfffc4";
    
    $appSid = 'AP0b995be538184272492ec62b8ae89914';
    $fromNumber = '+14805255051';
    
    
    $client = new Client($AccountSid, $AuthToken);

$capability = new ClientToken($AccountSid, $AuthToken);
$capability->allowClientOutgoing($appSid);
$token = $capability->generateToken();

    // Step 3: Instantiate a new Twilio Rest Client
   
//    try {
//        // Initiate a new outbound call
//        $call = $client->account->calls->create(
//            // Step 4: Change the 'To' number below to whatever number you'd like 
//            // to call.
//            "6023631448",
//
//            // Step 5: Change the 'From' number below to be a valid Twilio number 
//            // that you've purchased or verified with Twilio.
//            "+14805255051",
//
//            // Step 6: Set the URL Twilio will request when the call is answered.
//            array("url" => "http://demo.twilio.com/welcome/voice/")
//        );
//        echo "Started call: " . $call->sid;
//    } catch (Exception $e) {
//        echo "Error: " . $e->getMessage();
//    }
    ?>


<html>
    <head>
        <link href="style.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="//media.twiliocdn.com/sdk/js/client/v1.4/twilio.min.js"></script>
 <script type="text/javascript" src="custom.js"></script>
 <script type="text/javascript" src="calling.js"></script>
 <script type="text/javascript">

     Twilio.Device.setup("<?php echo $token; ?>");

     Twilio.Device.ready(function (device) {
       $("#ua-status").text("Ready");
     });
        Twilio.Device.incoming(function (conn) {
        $("#ua-status").text("Incoming connection from " +
        conn.parameters.From);
        conn.accept();
        });
     Twilio.Device.error(function (error) {
       $("#ua-status").text("Error: " + error.message);
     });
       Twilio.Device.disconnect(function (conn) {
   $("#ua-status").text("Call ended");
       });
     Twilio.Device.connect(function (conn) {
       $("#ua-status").text("Successfully established call");
     });
   function hangup() {
   Twilio.Device.disconnectAll();
   }
     function call() {
       alert($("#ua-uri").val());
      params = { "PhoneNumber" : $("#ua-uri").val()  };  
      Twilio.Device.connect(params);
     }
     Twilio.Device.incoming(function (conn) {
// automatically accept the call
conn.accept();
});
 </script>
 
        <meta charset="UTF-8">
        <title>Twilio Calling</title>
    </head>
    <body>
        
             <input class="phonebookbtn"  id='phonemainbtn' value=" PhoneBook" />

       <div id="toPopup">
<p  class="cancel"  onclick="HidePhone()">&times;</p>
 <center>
<div class="ext" id="ext">Extension:</div>
                    <div class="status">
                      
                        <div id="conn-status">
                            <span class="field">status: </span>
                            <span id="ua-status">Disconnected</span>
<!--                            <span id="ua-status" class="value"></span>-->
   <button id="ua-register"  style="display:none" class="btnclass">Register</button>
<!--          <span class="field">user: </span>
  <span class="value user"></span>-->
                        </div>
                    </div>
                </center>

  <div class='phonebook'>
      <button class="hangup" onclick="hangup();">Hangup
</button>
    <ul id="session-list"></ul>

                           <ul id="templates">
      <li id="session-template" class="template session">
        <h2><strong class="display-name"></strong> <span style="display:none" class="uri"></span></h2>
<div>
        <button    class="phonechildbtn green btnclass">Green</button>
        <button   class="phonechildbtn red btnclass">Red</button>
</div>
<div style="margin-top: 10px;">
  <button  style=""  id="hold" class="phonechildbtn Hold btnclass">Hold</button>           <button  style=""  id="Transfer" class="phonechildbtn Transfer btnclass">Transfer</button>
</div> 
        <form class="dtmf" action="" style="display:none">
          <label>DTMF <input type="text" maxlength="1" /></label>
          <input type="submit" value="Send" />
        </form>
        <video autoplay>Video Disabled or Unavailable</video>
<!--        <ul class="messages"></ul>
        <form class="message-form" action="">
          <input type="text" placeholder="Type to send a message"/><input type="submit" value="Send" />
        </form>-->
      </li>

    </ul>  
                  
                        </div>

 <div id="phone">
                        <div class="controls">

                            <div class="ws-disconnected"></div>

                            <div class="dialbox">
                                <input type="text" id="ua-uri" class="destination" value=""/>
                                <div class="to">To:</div>
                                <div class="dial-buttons">
                                    <center><input type="submit" onclick="call();" class="call phonechildbtn btnclass" id="ua-invite-submit" value="Call" /> 
				      <input type="submit" style="display:none" id="ua-invite-hangup" value="HangUp" /> 
</center>
                                     
<!--                                    <div class="button call">call</div> -->
                                </div>
                            </div>

                            <div class="dialpad">
                                <div class="line">
                                    <div class="button digit-1">1</div>
                                    <div class="button digit-2">2</div>
                                    <div class="button digit-3">3</div>
                                </div>
                                <div class="line-separator"></div>
                                <div class="line">
                                    <div class="button digit-4">4</div>
                                    <div class="button digit-5">5</div>
                                    <div class="button digit-6">6</div>
                                </div>
                                <div class="line-separator"></div>
                                <div class="line">
                                    <div class="button digit-7">7</div>
                                    <div class="button digit-8">8</div>
                                    <div class="button digit-9">9</div>
                                </div>
                                <div class="line-separator"></div>
                                <div class="line">
                                    <div class="button digit-asterisk">*</div>
                                    <div class="button digit-0">0</div>
                                    <div class="button digit-pound">#</div>
                                </div>
                            </div><!-- .dialpad -->



    <!-- Templates to clone Sessions and Messages -->

                        </div><!-- .controls -->

 
</div>
                    </div>

    </body>
</html>
