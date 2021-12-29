<?php

    require 'vendor/autoload.php';
    $client = new Google_Client();
    $client->setClientId('550635920173-4paoammch0atb1m63lvmmk5bisorid2k.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://127.0.0.1/grossorshop/googlelogin.php');
    $client->addScope('email');
    $client->addScope('profile');
?>