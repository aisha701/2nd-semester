<?php
require("connection.php");
 if(isset($_POST['Add'])){

    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $city=$_POST['city'];

 $insert="INSERT INTO `student`( `name`, `contact no`, `city`) VALUES ('$name','$contact','$city');";
 $result=mysqli_query($connection , $insert) or die ("failed to insert query.");
 if($result){
    echo "<script>alert('student`s details added')</script>";
 }  
 else{

    echo "<script>alert('failed to added')</script>";
 }
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
    h1{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: darkcyan;
        text-decoration: underline dashed darkslategray;
        margin-top: 5rem;
        margin-bottom: 2rem;
    }
    .form-control{
        border: 1px groove black;
    }
    .form-control::placeholder{
        color: darkcyan;
        text-transform: capitalize;
    }
    .submit{
        background-color: darkcyan;
        border: 1px solid darkcyan;
        color: white;
    }
    form .link a{

      color: darkcyan;
      justify-content: center;
      align-items: center;
    }
  </style>
  <body>
     <div class="container my-4">
        <h1 class="text-center">ENTER STUDENT DETAILS</h1>

        <form action="" class="form-group" method="post">
<input type="text" class="form-control my-2" name="name" id="" placeholder="enter student's name" >
<input type="number" class="form-control my-2" name="contact" id="" placeholder="enter student's contact no">
<input type="text" class="form-control my-2" name="city" id="" placeholder="enter student's city">
<input type="submit" class="form-control my-2 submit" name="Add" id="" >
<p class="link"><a href="./index.php" >Edit or delete your data</a></p>

        </form>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>