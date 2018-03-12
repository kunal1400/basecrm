<?php
require_once('_bootstrap.php');
use RingCentral\SDK\SDK;
$credentials=array(
    "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
    "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
    "username" => "+14805256665",
    "password" => "Panther1!"
);
$credentials= array(
    'username'     => '+14805256665', // your RingCentral account phone number
    'extension'    =>  null, // or number
    "password" => "Panther1!",
    "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
    "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
    'server'       => 'http://platform.devtest.ringcentral.com', // for production - https://platform.ringcentral.com
    'smsNumber'    => '14805256665', // any of SMS-enabled numbers on your RingCentral account
    'mobileNumber' => '14805256665', // your own mobile number to which script will send sms
    'dateFrom'	   => 'yyyy-mm-dd',  // dateFrom
    'dateTo'       => 'yyyy-mm-dd'   // dateTo
);



$RingCentral = new SDK($credentials["appKey"], $credentials["appSecret"], RingCentral\SDK\SDK::SERVER_PRODUCTION);
$RingCentral->platform()->login($credentials["username"], "1", $credentials["password"]);

if ($RingCentral->platform()->loggedIn()) {
    $apiResponse = $RingCentral->platform()->get('/account/~/extension/~/address-book/contact', array("phoneNumber" => $this->formatPhoneNumber($number)));
    if (count($apiResponse->json()->records) == 0) {
        $apiResponse = $RingCentral->platform()->post('/account/~/extension/~/address-book/contact', array(
            "firstName" => $firstName,
            "lastName" => $lastName,
            "email" => $email,
            "mobilePhone" => $this->formatPhoneNumber($number),
        ));

            var_dump($apiResponse->json());

    }
}


die();
/*
*/

//use RingCentral\SDK\SDK;
//require_once('_bootstrap.php');


// Create SDK instance

//$credentials = require(__DIR__ . '/_credentials.php');
$credentials=array(
    "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
    "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
    "username" => "+14805256665",
    "password" => "Panther1!"
);
$credentials= array(
    'username'     => '+14805256665', // your RingCentral account phone number
    'extension'    =>  null, // or number
    "password" => "Panther1!",
    "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
    "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
    'server'       => 'http://platform.devtest.ringcentral.com', // for production - https://platform.ringcentral.com
    'smsNumber'    => '14805256665', // any of SMS-enabled numbers on your RingCentral account
    'mobileNumber' => '14805256665', // your own mobile number to which script will send sms
    'dateFrom'	   => 'yyyy-mm-dd',  // dateFrom
    'dateTo'       => 'yyyy-mm-dd'   // dateTo
);

$rcsdk = new SDK($credentials['appKey'], $credentials['appSecret'], $credentials['server'], 'Demo', '1.0.0');

$platform = $rcsdk->platform();

// Authorize

$platform->login($credentials['username'], $credentials['extension'], $credentials['password']);

// Find SMS-enabled phone number that belongs to extension

$phoneNumbers = $platform->get('/account/~/extension/~/phone-number', array('perPage' => 'max'))->json()->records;

$smsNumber = null;

foreach ($phoneNumbers as $phoneNumber) {

    if (in_array('MmsSender', $phoneNumber->features)) {

        $smsNumber = $phoneNumber->phoneNumber;

        break;

    }

}

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

