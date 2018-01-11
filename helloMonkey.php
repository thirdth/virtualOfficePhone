<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>You have reached tech for lawyers.</Say>
    <Gather numDigits="1" action="hello-monkey-transfer.php" method="POST">
      <Say>To speak to a representative, please press 1.</Say>
    </Gather>
</Response>
