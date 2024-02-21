<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a=-10;
    $name="aisha";
    $Name="aslam aslam";
    $str="hello world!";

    // print ($name);
    // echo "<h1>hello this is $Name </h1>";
    // echo "<h1>hello this is ".($a+10)."</h1>";

    // echo abs($a);
    // echo round(6.5);
    // echo sqrt(474);
    // echo ceil(4.4);
    // echo floor(7.8);
    
    // echo (ucwords($str));
    // echo (strrev($str));
    // echo (str_word_count($str));


//  number
     $a=10; //int
     $b=10.32;//float
     $c=1.456824243;//double
//string
      $str1="hello how are you";
//array
       $students=array("ayesha","areesha","areej","aiman","dania");
    // echo$students[4]
    
// function add(){
//     echo 10+20;
// }
//calling function
// add()

// parameteriezed function
function add($a=0,$b=0,$c=0){
    return $a+$b+$c/100;
}
$d=add(50,40,60);
echo $d;

// condition
// $age=18 ;
// if($age>18)
// {echo "you can vote";}
// elseif($age=18){
//     echo '<script>alert("you can vote")</script>';}
// else
// {
//     echo "you can't vote";
// }

    ?>
</body>
</html>
