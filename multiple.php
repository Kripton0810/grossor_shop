<?php
    if(isset($_POST['submit']))
    {
        print_r($_FILES['data']);
        for($i=0;$i<count($_FILES['data']['tmp_name']);$i++)
        {
            print_r($_FILES['data']['tmp_name'][$i]);//<-location destination
            print_r($_FILES['data']['name'][$i]);
            echo "<br>";
        }
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
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="data[]" multiple="">
        <input type="submit" name="submit">
    </form>
</body>
</html>