<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$factory = (new Factory)->withServiceAccount(__DIR__.'/grocery-326115-firebase-adminsdk-j520n-65f15368eb.json')
                ->withDatabaseUri('https://grocery-326115-default-rtdb.firebaseio.com');


    $db = $factory->createDatabase();
?>