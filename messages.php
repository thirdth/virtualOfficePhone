<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require_once 'SDK/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$client = new Client($TWsid, $TWtoken);
print_r($client);

// Loop over the list of recordings and echo a property for each one
foreach ($client->read() as $message) {
  //  print_r($message);
  /*  echo "<div>
            <a href='https://api.twilio.com/2010-04-01/Accounts/". $TWsid . "/Recordings/" . $recording->sid . "'>" . $recording->sid . "</a>
          </div>";*/
}
?>
