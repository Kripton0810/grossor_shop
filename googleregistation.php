<?php
session_start();
    require 'dbcon.php';
    require 'config.php';
if(isset($_SESSION['access_token'])){
$client->setAccessToken($_SESSION['access_token']);
}
elseif(isset($_GET['code']))
{
    $token= $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
}
else
{
    header('location:registation.php');
    exit();
}
$gservice = new Google_Service_Oauth2($client);
$data = $gservice->userinfo->get();
print_r(json_encode($data));
echo "<img src='{$data['picture']}'>";
?>