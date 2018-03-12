<?php

$credentials = require(__DIR__.'/ringcentral/ringcentral-php-master/demo/_credentialsSample.php');

require_once(__DIR__.'/ringcentral/ringcentral-php-master/demo/_bootstrap.php');
use RingCentral\SDK\SDK;
// Create SDK instance



$rcsdk = new SDK($credentials['appKey'], $credentials['appSecret'], $credentials['server'], 'Demo', '1.0.0');
$platform = $rcsdk->platform();
// Authorize

$platform->login($credentials['username'], $credentials['extension'], $credentials['password']);
// Find SMS-enabled phone number that belongs to extension
/*$phoneNumbers = $platform->get('/account/~/extension/~/phone-number', array('perPage' => 'max'))->json()->records;
$smsNumber = "14805256665";
foreach ($phoneNumbers as $phoneNumber) {
    if (in_array('MmsSender', $phoneNumber->features)) {
        $smsNumber = $phoneNumber->phoneNumber;
        break;
    }
}
*/

/*
print 'MMS Phone Number: ' . $smsNumber . PHP_EOL;
// Send Fax
$request = $rcsdk->createMultipartBuilder()
                ->setBody(array(
                    'from' => array('phoneNumber' => $smsNumber),
                     'to'   => array(
                        array('phoneNumber' => $credentials['mobileNumber']),
                     ),
                 ))
                 ->add(fopen('https://developers.ringcentral.com/assets/images/ico_case_crm.png', 'r'))
                 ->request('/account/~/extension/~/sms');
//print $request->getBody() . PHP_EOL;
$response = $platform->sendRequest($request);
print 'Sent MMS ' . $response->json()->uri . PHP_EOL;