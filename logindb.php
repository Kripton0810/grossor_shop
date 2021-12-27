<?php
    include 'dbcon.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE `email`='{$email}'";
    $run = $con->query($query);
    if (mysqli_num_rows($run)==0) {
        echo "no user present!! signup first";
    } else {
        $row = mysqli_fetch_assoc($run);
        if($row['isactive'])
        {
            if (password_verify($password,$row['password'])) {
                echo "login successfull";
            }
            else
            {
                echo "Wrong password";
            }
        }
        else
        {
            echo "Pls activate your account";
        }
    }
    
?>