<?php
include "header.php";
$server="localhost";
$username="root";
$dbpass="";
$dbname="1455701";

$connection=mysqli_connect($server,$username,$dbpass,$dbname);
if($connection){
    $read=" SELECT * FROM `student`;";
    $result=mysqli_query($connection,$read);
    if($result){
        if(mysqli_num_rows($result) > 0){
            ?>
            
            <h1>STUDENT MARKSHEET</h1>
            <table class="table">
  <thead>
  <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">contact</th>
        <th scope="col">city</th>
        <th scope="col">Actions</th>
    </tr>
  </thead>
<p class="form-link"><a href="./insert.php" >Back to form</a>
</p>

   
<?php
while($row=mysqli_fetch_assoc($result)){

    echo "<tr>";
    echo  "<td scope='row'>".$row['id']."</td>";
    echo  "<td>".$row['name']."</td>";
    echo  "<td>".$row['contact no']."</td>";
    echo  "<td>".$row['city']."</td>";
    echo  '<td>
    <a href="update.php?id='.$row["id"].'"class="btn btn-success">Edit</a>
    <a href="delete.php?id='.$row["id"].'" class="btn btn-danger">Delete</a>
    </td>';
    echo "</tr>";
}
?>
</table>

<?php     
 }
 else{
    echo "<script>alert('record not found')</script>";
 }
    }
    else{
        echo "<script>alert('failed to execute query')</script>";
    }
}
else{
    die("failed to connect");
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
.form-link a{
    color: darkcyan;
   ;
}
</style>
<body>
    
</body>
</html>
