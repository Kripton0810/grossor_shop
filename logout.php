<?php
session_start();
//session abot
session_destroy();
setcookie("email","",time()-1000);
setcookie("password","",time()-1000);

session_abort();
header("location: /grossorshop/");
// setcookie("email","subhankar",time()+30);
?>