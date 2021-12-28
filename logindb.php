<?php
    session_start();
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
                if (isset($_POST['rempass'])) {
                    //cookie set kare ge
                    setcookie("email",$email,time()+1296000);//for 15 days
                    setcookie("password",$password,time()+1296000);//for 15 days
                }
                $_SESSION['token']=$row['token'];
                header("location: /grossorshop/");
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