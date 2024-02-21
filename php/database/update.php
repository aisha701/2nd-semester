<?php
include("header.php");
require("connection.php");
 if($_GET['id']){
  $id=$_GET['id'];
     $getdata="SELECT * FROM `student` WHERE  id='$id';";
     $result=mysqli_query($connection, $getdata) or die("fail to run query");
     if (mysqli_num_rows($result) == 1){
        $row=mysqli_fetch_assoc($result);
        $name=$row['name'];
        $contact=$row['contact no'];
        $city=$row['city'];?>
        
        <div class="container my-4">
        <h1 class="text-center">ENTER STUDENT DETAILS</h1>

        <form action="updatedata.php" class="form-group" method="post">
<input type="hidden" class="form-control my-2" name="id" id="" value="<?php echo $id?>">
<input type="text" class="form-control my-2" name="name" id="" placeholder="enter student's name" value="<?php echo $name?>">
<input type="number" class="form-control my-2" name="contact" id="" placeholder="enter student's contact no" value="<?php echo $contact?>">
<input type="text" class="form-control my-2" name="city" id="" placeholder="enter student's city" value="<?php echo $city?>">
<input type="submit" class="form-control my-2 submit" name="Add" id="" >
        </form>
     </div> 
        <?php
     }
     else{
        echo"record not found";
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
<style>
h1{
    color: darkblue;
    text-align: center;
    font-family: cursive;
    text-decoration: underline lightblue 3px double;
}
th{
  color: darkblue;
  background-color: lightblue;
}
table{
    border:solid 2px darkblue;
    border-radius: 5px;
    text-align: center;
}
tr{
    color: darkblue;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
</style>
<body>
   
</body>
</html>