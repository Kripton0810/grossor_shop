<?php
include 'dbcon.php';
    date_default_timezone_set('asia/kolkata');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $unm = $_POST['username'];
    $gender = $_POST['gender'];
    $phon = $_POST['phno'];
    $pass = $_POST['password'];
    $hash = password_hash($pass,PASSWORD_BCRYPT);
    $token  = bin2hex(random_bytes(20));
    $query = "SELECT * FROM `user` WHERE `email`='{$email}'";
    $run = $con->query($query);
    if(mysqli_num_rows($run)==0)
    {
        $date = date("Y-m-d H:i:s");
        $upload = "INSERT INTO `user`(`username`, `name`, `email`, `phone`, `gender`, `password`, `token`, `isactive`, `registationTime`) VALUES ('{$unm}','{$name}','{$email}','{$phon}','{$gender}','{$hash}','{$token}',true,'{$date}')";
        $uploadRun = $con->query($upload);
        if($uploadRun)
        {
            echo "You have been registered Successfully";
        }
        else
        {
            echo "error in server";
        }
    }
    else
    {
        echo "already registered";
    }
?>