<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once '/../config/config.php'
require_once $_SERVER[DOCUMENT_ROOT] . '/SDK/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$client = new Client($sid, $token);

// Loop over the list of recordings and echo a property for each one
foreach ($client->recordings->read() as $recording) {
    echo $recording->duration;
}
?>
