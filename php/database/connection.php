<?php
$server="localhost";
$username="root";
$dbpass="";
$dbname="1455701";

$connection=mysqli_connect($server,$username,$dbpass,$dbname);
if(!$connection){
    die("failed to connect");
}
// else{
//     echo "connect";
// }






?>