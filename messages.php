<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require_once 'SDK/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$client = new Client($TWsid, $TWtoken);

// Loop over the list of recordings and echo a property for each one
/*foreach ($client->recordings->read() as $recording) {
    print_r($recording);
    echo "<div>
            <a href='https://tel.tech4lawyers.com/recordings.php?callSid=" . $recording->sid . "'>" . $recording->sid . "</a>
          </div>";
}*/

foreach ($client->calls->read() as $call) {
  print_r($call);
  echo "  |  ";
  print_r($call->recordings);
  echo "  |  ";
  print_r($call->recordings->read());
  echo "<div>
          <p>" . $call->direction . " | " . $call->startTime->date . "</p>
          <a href='recordings.php?callSid=" . $call->sid . "'>" . $call->sid . "</a>
        </div>";
}
?>
