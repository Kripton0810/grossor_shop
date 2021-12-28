<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$factory = (new Factory)->withServiceAccount(__DIR__.'/pace-classes-firebase-adminsdk-bork2-25b9870fd2.json')
                ->withDatabaseUri('https://pace-classes-default-rtdb.firebaseio.com');


    $db = $factory->createDatabase();
?>