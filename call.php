<?php
//require_once "vendor/autoload.php";
// require __DIR__ . '/Twilio/autoload.php';
include "vendor/autoload.php";
    use Twilio\Rest\Client;
    use Twilio\Jwt\ClientToken;


$twilio_config = array(
    "AccountSid" => "ACfd5e34ad10ec64d0ab97c7c43202c686",
    "AuthToken" => "b8931b8dd4db63aba48be24435dfffc4"
);

$sid = $twilio_config["AccountSid"];
//true till here
$token = $twilio_config["AuthToken"];
$debug=true;

//$client = new Client($sid, $token);


  // Step 2: Set our AccountSid and AuthToken from https://twilio.com/console
//    $AccountSid = "ACfd5e34ad10ec64d0ab97c7c43202c686";
//  $AuthToken = "b8931b8dd4db63aba48be24435dfffc4";

  $appSid = 'AP0b995be538184272492ec62b8ae89914';



//$client = new Client($AccountSid, $AuthToken);

$capability = new ClientToken($sid, $token);

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
<!DOCTYPE html>
<html>
<head>
<title>Hello Client Monkey 1</title>
<script type="text/javascript"
 src="//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js"></script>
<script type="text/javascript"
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>
<!--    <link href="//static0.twilio.com/resources/quickstart/client.css"
 type="text/css" rel="stylesheet" />-->
<script type="text/javascript">

 Twilio.Device.setup("<?php echo $token; ?>");

 Twilio.Device.ready(function (device) {
   $("#log").text("Ready");
 });

 Twilio.Device.error(function (error) {
   $("#log").text("Error: " + error.message);
 });

 Twilio.Device.connect(function (conn) {
   $("#log").text("Successfully established call");
 });

 function call() {
   Twilio.Device.connect();
 }
</script>
</head>
<body>
<button class="call" onclick="call();">
 Call
</button>

<div id="log">Loading pigeons...</div>
</body>
</html>