<?php
include 'dbcon.php';
include 'config.php';
include 'firebasecon.php';
    date_default_timezone_set('asia/kolkata');
    $date = date("Y-m-d H:i:s");
    if(isset($_POST['submit']))
    {
      
    $name = $_POST['name'];
    $email = $_POST['email'];
    $unm = $_POST['username'];
    $gender = $_POST['gender'];
    $phon = $_POST['phno'];
    $pass = $_POST['password'];
    $hash = password_hash($pass,PASSWORD_BCRYPT);
    $token  = bin2hex(random_bytes(20));
    $query = "SELECT * FROM `user` WHERE `email`='{$email}'";//if any user present
    $run = $con->query($query);
    $error = array();
    if(mysqli_num_rows($run)>0)
    {
         array_push($error,"already registered");
    }
    else
    {
      if(strlen($name)==0)
      {        
        array_push($error,"Enter your name");
      }
      if(strlen($email)==0)
      {        
        array_push($error,"Enter your email");
      }
      if(strlen($phon)==0)
      {        
        array_push($error,"Enter your phone number");
      }
      
      if(strlen($pass)<8)
      {
        array_push($error,"Password should be greater then 8");
      }
    }
    
    
     if(count($error)>0)
     {
       $i=0;
       while ($i < count($error)) {
       echo "<div class='alert alert-dismissible alert-danger w-25 text-center'>{$error[$i]} </div>";
       $i++;
       }
     }
     else
     {
      $upload = "INSERT INTO `user`(`username`, `name`, `email`, `phone`, `gender`, `password`, `token`, `isactive`, `registationTime`) VALUES ('{$unm}','{$name}','{$email}','{$phon}','{$gender}','{$hash}','{$token}',false,'{$date}')";
      $uploadRun = $con->query($upload);
      if($uploadRun)
      {
        $spical_tok = $token."::".$email."::".$date;
        $base = base64_encode($spical_tok);
        if (isset($_FILES['profile_pic'])) {
          $pic = $_FILES['profile_pic'];
          if(!file_exists('profileimg/'))
          {
            mkdir('profileimg/');
          }
          move_uploaded_file($pic['tmp_name'],"profileimg/{$token}.png");
        }
          echo "You have been registered Successfully<br>";
          $body = "Hi $name,\nTo activate your account pls click on this link valid upto 10 mins http://127.0.0.1/grossorshop/accountverify.php?user=".$base;
          $mail = mail($email,"Account Vaerification from grossor shop",$body);
          if($mail)
          {
            $data=[
              "email"=>$email,
              "username"=>$unm,
              "phone"=>$phon,
              "gender"=>$gender,
              "token"=>$token,
              "registationTime"=>$data,
              "isactive"=>false,
              "password"=>$hash
            ];
            $ref = "userdb/";
            $postdata = $db->getReference($ref)->push($data);
            echo "Mail send Token valid upto 10 mins";
          }
          else
          {
            echo "Error in server";
          }
        }
      else
      {
          echo "error in server";
      }
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://bootswatch.com/5/quartz/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <form class="w-100 d-flex flex-column" method="post" enctype="multipart/form-data">
        <div class="card border-secondary mx-auto mt-5 w-50">
            <div class="card-header"><i class="fas fa-user-friends"></i> Registation</div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" >
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                    <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="name" >
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                    <input type="text" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" name="email" >
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1" name="phno" >
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password" >
                  </div>
                  <div class="d-flex w-50 justify-content-between">
                    <i class="fas fa-venus-mars"></i><h6>Gender</h6>
                    <div class="form-check">
                       
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="male" >
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" id="optionsRadios3" value="female" >
                            Female
                        </label>
                      </div>
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="others" >
                        Others
                      </label>
                    </div>
                    <div class="form-group mb-2">
                      <label for="formFile" class="form-label">Profile Pic</label>
                      <input class="form-control" type="file" accept="image/png, image/jpg, image/gif, image/jpeg" name="profile_pic" id="formFile">
                    </div>
                    <div class="d-flex w-50 mx-auto justify-content-between">
                        <button type="submit" class="btn btn-outline-success" name = "submit">Submit</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-outline-warning" name="google">Google SignUp</a>
                    </div>
            </div>
          </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>