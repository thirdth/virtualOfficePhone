<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say voice="alice" language="en-gb">You have reached tech 4 lawyers.</Say>
    <Gather numDigits="1" action="hello-monkey-transfer.php" method="POST">
      <Say voice="alice" language="en">To speak to a representative, please press 1.</Say>
    </Gather>
</Response>
