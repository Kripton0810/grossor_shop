<?php
//befour using session start it
session_start();
include 'dbcon.php';
if (isset($_SESSION['token'])) {
    echo "user availabe";
}
else
{
    
    echo "user unavailabe";
    //how to redirect?
    header("location: login.php");
}
    echo "hello";
?>
<a href="logout.php">Logout</a>