<?php
    
include 'dbcon.php';
date_default_timezone_set('asia/kolkata');


$d = date("Y-m-d H:i:s");//current time
$data = $_GET['user'];
$all = base64_decode($data);
$arr = explode("::",$all);
$token = $arr[0];
$time = $arr[2];

$d1 = strtotime($d);
$d2 = strtotime($time);

$diff = $d1-$d2;

if($diff<=120)
{
    $query = "UPDATE `user` SET `isactive`= true where `token` = '$token'";
    $run = $con->query($query);
    if($run)
    {
        echo "Account activated successfully";
    }
    else
    {
        echo "Error while updaing!!";
    }
}
else
{
    $query = "DELETE FROM `user` where `token` = '$token'";
    $run = $con->query($query);
    if($run)
    {
        echo "Token Expire Re-register";
    }
    else
    {
        echo "Error while updaing!!";
    }
}



?>