<?php

    require 'vendor/autoload.php';
    $client = new Google_Client();
    $client->setClientId('977537279231-7hgorultet9o1ls8b8g60v3v6ioobov0.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://127.0.0.1/grossorshop/googleregistation.php');
    $client->addScope('email');
    $client->addScope('profile');
?>