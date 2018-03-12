<?php
/**
 * Created by PhpStorm.
 * User: Hazem1
 * Date: 12/23/2017
 * Time: 9:19 AM
 */
use Twilio\Rest\Client;
echo "here";
$twilio_config = array(
    "AccountSid" => "ACfd5e34ad10ec64d0ab97c7c43202c686",
    "AuthToken" => "b8931b8dd4db63aba48be24435dfffc4"
);
$calendlylink="calendly.com/iconcrmtech";
$clientmob=$_GET["mobile"];
$sid = $this->twilio_config["AccountSid"];
$token = $this->twilio_config["AuthToken"];
$client = new Client($sid, $token);
SendSMS($clientmob, "+14805258426",$calendlylink,"","");

function SendSMS($to1,$from1,$body,$vcfurl,$zip)
{
// "+16193978305?",chris
// "+16023631448",client
// "+1623725423",kyla
    global $client;
   $client->messages
        ->create(
            $to1,
            array(
                "from" =>  $from1,
                "body" => $body,
            )
        );
}
