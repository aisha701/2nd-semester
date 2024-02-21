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
        color: navy;
    }
    table{
text-align: center;
    }
    th{
        color: navy;    }
</style>
<body>
    <?php
    //  multidimesional associative array 
$marks=[
    "Ayesha"=>["english"=>88,"maths"=>56,"physics"=>76],
    "Areesha"=>["english"=>78,"maths"=>52,"physics"=>75],
    "Areej"=>["english"=>56,"maths"=>47,"physics"=>45],
    "Dania"=>["english"=>76,"maths"=>44,"physics"=>35],
    "Aiman"=>["english"=>71,"maths"=>65,"physics"=>86]
];

//  echo"<pre>";
//  print_r($marks);
//  echo "</pre>";   
    // echo $marks['ayesha']['english'];

    echo"<table border=1 cellpadding='7px'>
    <h1>STUDENT RESULT</h1>
    <tr>
    <th>Name</th>
    <th>English</th>
    <th>Maths</th>
    <th>Physics</th>
    <th>Percentage</th>
    </tr>";

 foreach ($marks as $key1 => $value1) {
    echo "<tr>";
    echo "<td>$key1</td>";
foreach ($value1 as $key2 => $value2) {

echo "<td>$value2 </td>";
}
echo "</tr>";
 }   
 echo "</table>"
    ?>

</body>
</html>