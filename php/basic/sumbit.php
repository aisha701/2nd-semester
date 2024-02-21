<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-style: italic;
        color: cornflowerblue;
        text-decoration: underline navy 3px;
    }
    h5{
        font-size: larger;
        text-transform: capitalize;
        font-weight: 100;
    }
    span{
        color: navy;
        text-transform: uppercase;
        font-weight: 600;
    }
</style>
<body>
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
echo "<h1>USER DATA</h1>
<h5><span>EMAIL</span>: ".$_POST['email']."</h5>
<h5><span>PASSWORD</span>: ".$_POST['password']."</h5>
 <h5><span>CITY</span>: ".$_POST['city']."</h5>
 <h5><span>PHONE NO</span>: ".$_POST['number']."</h5>
 <h5><span>NAME</span>: ".$_POST['username']."</h5>
 <h5><span>AGE</span>: ".$_POST['age']."</h5>";
?>
</body>
</html>