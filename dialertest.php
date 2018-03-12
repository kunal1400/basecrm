<?php
/**
 * Created by PhpStorm.
 * User: Hazem1
 * Date: 12/28/2017
 * Time: 10:44 PM
 */
include "vendor/autoload.php";
use Twilio\Rest\Client;

$twilio_config = array(
    "AccountSid" => "ACfd5e34ad10ec64d0ab97c7c43202c686",
    "AuthToken" => "b8931b8dd4db63aba48be24435dfffc4"
);

$from = "+16023631448";
$to= "+16023965471";//"+14805256665";
$lead="+16023396687";
//true till here
$base_domian_path = "http://rdccharlie.com/basecrm/";
$twilio_gather_handler_file = "twilio/twilio_gather_handler.php";
$twilio_forwarder_file = "twilio/forwarder.xml";
$twilio_gather_file = "twilio/twilio_gather.xml";


$sid = $twilio_config["AccountSid"];
//true till here
$token = $twilio_config["AuthToken"];
$debug=true;

$client = new Client($sid, $token);



twilio_make_call($from, $to,$lead );

function twilio_make_call($from, $to, $lead_number)
{

    global $base_domian_path,$twilio_forwarder_file,$client,$debug,$twilio_gather_file;
    twilio_generate_xml($from, $lead_number);
    //$client = new Twilio\Rest\Client($this->twilio_config["AccountSid"], $this->twilio_config["AuthToken"]);
    try {
        $call = $client->calls->create(
            $to,
            $from,
            array("url" => $base_domian_path . $twilio_gather_file)
        );
        if ($debug) {
            echo '<div>' . "Started call: " . $call->sid . '</div>';
        }
    } catch (Exception $e) {
        if ($debug) {
            echo "Error: " . $e->getMessage();
        }
    }
}
function twilio_generate_xml($caller_id, $lead_number)
{
    global $base_domian_path,$twilio_forwarder_file,$client,$debug,$twilio_gather_handler_file,$twilio_gather_file;

    $txt = '<Response><Dial callerId="' . $caller_id . '">' . $lead_number . '</Dial></Response>';
    $forwarder_file = fopen($twilio_forwarder_file, "w") or (($debug) ? die("Unable to open file!") : "");
    fwrite($forwarder_file, $txt);
    fclose($forwarder_file);
    $resp = '<?xml version="1.0" encoding="UTF-8"?>
<Response>
    <Pause length="3"/>
    <Gather action="' . $base_domian_path . $twilio_gather_handler_file . '" timeout="10" numDigits="1">
        <Say voice="alice">Please press 1 to forward this call to new lead, or press any key to cancel</Say>
    </Gather>
    <Redirect>' . $base_domian_path . $twilio_gather_file . '</Redirect>
</Response>';
    $gather_file = fopen($twilio_gather_file, "w") or (($debug) ? die("Unable to open file!") : "");
    fwrite($gather_file, $resp);
    fclose($gather_file);
}