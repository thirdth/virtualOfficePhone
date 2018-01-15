<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather numDigits="1" action="hello-monkey-transfer.php" method="POST">
      <Say voice="alice" language="en">Welcome to teck for lawyers. If you would like to speak to a representative, please press 1.</Say>
    </Gather>
</Response>
