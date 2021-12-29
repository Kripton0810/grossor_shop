<?php
    // date_default_timezone_set('asia/kolkata');
    // $date = date("Y-m-d H:i:s");
    // $email = "subhankar0810@gmail.com";
    // $token  = bin2hex(random_bytes(20));
    // $spical_tok = $token."::".$email."::".$date;
    // $enode = base64_encode($spical_tok);
    // $mail = mail("deepsagarboral@gmail.com,subhankar0810@gmail.com","This is a test mail","Sir,\nI subhankar dutta want to test this mail if you revicived pls send hello thank you!!\nYour sencier \nSubhankar dutta\n\nThe spical token is ".$enode);
    // if($mail)
    // {
    //     echo "mail send successfully";
    // }
    // else
    // {
    //     echo "error while mail sending...";
    // }
    if(isset($_FILES['image']))
    {
        print_r($_FILES['image']);
        $image = $_FILES['image'];
        if(!file_exists('images/'))
        {
            mkdir('images/');
        }
        move_uploaded_file($image['tmp_name'],'images/pic.png');
    }

?>
<form method = "post" enctype="multipart/form-data">
<input type = "file" accept="image/png,image/jpg,image/jpeg,application/pdf" name="image"/>
<input type = "submit"/>
</form>