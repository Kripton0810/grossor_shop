<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://bootswatch.com/5/quartz/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <form class="w-100 d-flex flex-column" method="post" action="logindb.php">
        <div class="card border-secondary mx-auto mt-5 w-50">
            <div class="card-header"><i class="fas fa-user-friends"></i> Login</div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username/Email" aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'] ?>" name="email" required="">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" required="">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="rempass" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember password?</label>
                  </div>
                    <div class="d-flex w-50 mx-auto justify-content-between">
                        <button type="submit" class="btn btn-outline-success" name = "submit">Submit</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
            </div>
          </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>