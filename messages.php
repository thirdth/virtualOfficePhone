<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once '/path/to/vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACc08b43ed3bd68082adf012d836f2dc83";
$token = "d66915e66058d445d81907a34f021e2f";
$recording_sid = "RE557ce644e5ab84fa21cc21112e22c485";
$client = new Client($sid, $token);

// Loop over the list of recordings and echo a property for each one
foreach ($client->recordings->read() as $recording) {
    echo $recording->duration;
}
?>
