<?php

    // if the caller pressed anything but 1 send them back
    if($_REQUEST['Digits'] != '1') {
        header("Location: hello-monkey.php");
        die;
    }

    // the user pressed 1, connect the call to 310-555-1212
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Dial timeout="10">+16159457818</Dial>
    <Say>Tech for lawyers is not available, please leave a message.</Say>
    <Record maxLength="30" action="hello-monkey-handle-recording.php" />
    <Say>Goodbye</Say>
</Response>
