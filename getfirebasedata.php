<?php
//   $headers = apache_request_headers();
//     include('firebasecon.php');
//     // $m = new MongoClient();
//     // phpinfo();
//     $ref = $db->getReference('userdb');
//     $snap = $ref->getSnapshot();
//     $val = $snap->getValue();
//     // print_r(json_encode($val));
//     print_r($headers);
//     foreach($val as $key=> $row)
//     {
//         print_r();
//     }
if(isset($_FILES['pro_pic']))
{
    if(file_exists('images/'))

    {
        echo "file got";
    }
    else{        
         mkdir('images');
    }
    move_uploaded_file($_FILES['pro_pic']['tmp_name'],'images/hemlo.png');
    print_r($_FILES['pro_pic']);
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <input type="file" accept="image/gif, image/jpg, image/png, image/jpeg" name="pro_pic">
    <input type="submit">
</form>
</body>
</html>