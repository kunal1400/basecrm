<?php

print "Test 1: authData.php\n";
require('demo/authData.php');

print "Test 2: errorHandling.php\n";
require('demo/errorHandling.php');

print "Test 3: extensions.php\n";
require('demo/extensions.php');

if (!$argv || !in_array('skipSMS', $argv)) {
	print "Test 4: sms.php\n";
    require('demo/sms.php');
} else {
	print "Test 4: sms.php - skipping...\n";
}

if (!$argv || !in_array('skipMMS', $argv)) {
	print "Test 5: mms.php\n";
    require('demo/mms.php');
} else {
	print "Test 5: mms.php - skipping...\n";
}

if (!$argv || !in_array('skipRingOut', $argv)) {
	print "Test 6: ringout.php\n";
    require('demo/ringout.php');
} else {
	print "Test 6: ringout.php - skipping...\n";
}

print "Test 7: subscription.php\n";
require('demo/subscription.php');