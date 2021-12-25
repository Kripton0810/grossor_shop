<?php
 $mail = mail("subhankar0810@gmail.com","This is a test mesage","Hello pls get lost ok bye done tested");
 if($mail)
 {
     echo "mail send";
 }
 else
 {
     echo "mail not send";
 }
?>