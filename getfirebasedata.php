<?php

    include('firebasecon.php');
    $ref = $db->getReference('userdb');
    $snap = $ref->getSnapshot();
    $val = $snap->getValue();
    print_r($val);
?>