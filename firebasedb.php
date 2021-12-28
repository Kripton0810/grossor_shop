<?php
include('firebasecon.php');

    $data=[
        "username"=>"vinod kamle",
        "email"=>"opbhai@gmail.com",
        "phon"=>"343254433",
        "gender"=>"male"
    ];
    $ref = "userdb/";
    $postdata = $db->getReference($ref)->push($data);
    
?>