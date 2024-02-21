<?php 
include("../include/header.php");
include("../include/connection.php");
include("./nav.php");


?>
<style>
.card:hover{
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}
.sales{
    margin-top: 2rem;
    margin-bottom: 1rem;
    background: darkred;
    height: 30px;
    padding: 2px;
 
border-radius:5px;}
.sales a{
    color:white;
    text-decoration: none;
    font-weight: bold;
    letter-spacing:1px;
}
</style>
<!-- buttons -->
<div class="container" style="margin-top:120px;">
<?php 
if(isset($_GET['cat_id'])){
    $active="";
}else{
    $active="active";

}
?>

<div class="container d-flex justify-content-center sales"><a href="./sales.php">SALES IS GOING ON</a></div>
<div class="d-flex justify-content-center">
<a href="sales.php" class="btn btn-outline-dark <?=$active?> mx-2">ALL</a>
<?php 
$getdiscount="SELECT * from discount;";
$getdiscount_run=mysqli_query($connection, $getdiscount) or die("failed to get categories");
if(mysqli_num_rows($getdiscount_run) > 0){
    while($discount=mysqli_fetch_assoc($getdiscount_run)){
        $active_discount="";
        if(isset($_GET['dis_id'])){
            if($_GET['dis_id']==$discount['discount_id']){

                $active_discount="active";

            }else{
                $active_discount="";
            }


        }
        echo'<a href="sales.php?dis_id='.$discount['discount_id'].'" class="btn btn-outline-dark '.$active_discount.' mx-2" >'.$discount['value'].'</a>';
    }
}

?>
</div>


</div>
<!-- buttons end -->
<div class="container my-4">
    <div class="row">
<?php 

if(isset($_GET['dis_id'])){
$dis_id=$_GET['dis_id'];

    $getClothesBydiscount="SELECT * FROM `clothes` as c inner join `discount` as dis on c.discount_id=dis.discount_id
     where c.discount_id='$dis_id'
     ORDER by c.id DESC;";
    $getClothesBydiscount_run=mysqli_query($connection, $getClothesBydiscount) or die("failed");
    if(mysqli_num_rows($getClothesBydiscount_run) > 0){
    while($cloth=mysqli_fetch_assoc($getClothesBydiscount_run)){
        echo'
        

        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" >
  <img src="images/'.$cloth['image'].'" class="card-img-top" alt="..." height=400>
  <div class="card-body">
 
    <h5 class="card-title">'.$cloth['name'].'  <span class="badge text-bg-danger">'.$cloth['value'].' %Off </span></h5>
    <p class="card-text">'.$cloth['description'].'</p>
    <p class="card-text btn btn-outline-danger" style="">'.$cloth['price'].'</p><br>
   

    <a ><s>'.$cloth['price']-($cloth['price']*$cloth['value']/100).'PKR</s></a>
  </div>
</div>
        </div>
                

        ';
    }
}
}else{
    // echo "get all";
    $getAllClothes="SELECT * FROM `clothes` as c inner join `discount` as dis on c.discount_id=dis.discount_id ORDER by c.id DESC;";
    $getAllClothes_run=mysqli_query($connection, $getAllClothes) or die("failed");
    if(mysqli_num_rows($getAllClothes_run) > 0){
    while($cloth=mysqli_fetch_assoc($getAllClothes_run)){
        echo'
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" >
  <img src="images/'.$cloth['image'].'" class="card-img-top" alt="..." height=400>
  <div class="card-body">
 
    <h5 class="card-title">'.$cloth['name'].'  <span class="badge text-bg-danger">'.$cloth['value'].'</span></h5>
    <p class="card-text">'.$cloth['description'].'</p>
   

    <a href="#" class="btn btn-outline-danger">'.$cloth['price'].'PKR</a>
  </div>
</div>
        </div>
        
        ';
    }
}


}
?>




    </div>
</div>

<?php 
include("./footer.php");
?>
