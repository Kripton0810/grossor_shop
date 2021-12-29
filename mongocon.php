<?php
error_reporting(0);
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\SMTP;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['submit']))
{
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bookbin0810@gmail.com';                     //SMTP username
    $mail->Password   = 'Bookbin@2022';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('bookbin0810@gmail.com', 'Production');
    // $mail->addAddress('subhankar0810@gmail.com', 'Subhankar dutta');     //Add a recipient
    // $mail->addAddress('pparhawk@gmail.com');               //Name is optional
    // $mail->addReplyTo('subhankar0810@gmail.com', 'I was not well ');
    $mail->addCC('subhankar0810@gmail.com');
    $mail->addCC('pparhawk@gmail.com');
    // $mail->addBCC('bcc@example.com');
    // //Attachments
    $file = $_FILES['data'];
    if(isset($_POST['submit']))
    {
        print_r($_FILES['data']);
        for($i=0;$i<count($_FILES['data']['tmp_name']);$i++)
        {
            $mail->addAttachment($_FILES['data']['tmp_name'][$i],$_FILES['data']['name'][$i]);            
        }
    }
    // $mail->addAttachment($_FILES['data']['tmp_name'],'image.png');         //Add attachments??
    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "This is the HTML message body <b>in bold!</b> <img src='https://ci5.googleusercontent.com/proxy/26E3CTZUHEGIGUGip8bP9WmKDs0kmNGfBjEKILsmIuy1s0VwMXj4p_jls0487dDdb6X0jq_0lvfs7WfnzzP-B71IbgM747lYBz7l_kItmAI66FYSFyxeqvHJz9rSbMKfCAYk6VDydwTITtuEitYfU4WkJrRHHtfjTKpjJcPwzfNTeDVRruIC7tOYTwM3ivjln3yYtXRwfWlpGelxVvHBV64YlcMLhODeOpAysAnNwuK9zPzh3_m1JsTRyOO-qjMSqrGltw=s0-d-e1-ft#https://media-exp1.licdn.com/dms/image/C5603AQFxOQdpk90ixg/profile-displayphoto-shrink_100_100/0/1625570316508?e=2159024400&v=beta&t=XKKdEKDnadnsT6ZiiYIX8cIM4GyTS1UMvydAgknfw2I'>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="data[]" multiple="">
    <input type="submit" name="submit">
</form>