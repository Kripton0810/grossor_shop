<?php
    
include 'dbcon.php';
date_default_timezone_set('asia/kolkata');
// $raw = "subhankar0810@gmail.com::".date("Y-m-d H:i:s");
// $time = base64_encode($raw);
// echo $time."<br>";
// $de = base64_decode($time);
// $arr = explode("::",$de);
// $d1 = date_create("2021-12-26 00:11:00");
// $d2 = date_create("2021-12-26 00:01:00");
// $date = date_diff($d1,$d2);
// print_r($arr);
// print_r($date);
$data = $_GET['user'];
$query = "UPDATE `user` SET `isactive`= true where `token` = '$data'";
$run = $con->query($query);
if($run)
{
    echo "Account activated successfully";
}
else
{
    echo "Error while updaing!!";
}
?>