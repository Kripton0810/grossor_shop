<?php

include 'firebasecon.php';
$uid = "anita0810@gmail.com";
$postData = [
    'gender' => 'female',
];

// Create a key for a new post
$newPostKey = $db->getReference('userdb')->push()->getKey();
print_r($newPostKey);
$updates = [
    'userdb/'.$newPostKey => $postData,
    'userdb/'.$uid.'/'.$newPostKey => $postData,
];

$db->getReference()->update($updates);
?>
    