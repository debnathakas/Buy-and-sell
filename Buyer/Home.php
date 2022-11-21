<?php

// start session


include "../DatabaseConn.php";
require_once("php/component.php");
require_once("buyerhomepage.php");

$buyerID=$_GET["buyerID"];
// echo "$buyerID";


if(isset($_POST["add"])){
  //  print_r($_POST["product_id"]);
  $product_id=$_POST["product_id"];
  // echo "$product_id";
  $buyerID=$_GET["buyerID"];

  
  $sql2="SELECT * FROM e_dukan.product WHERE pid='$product_id'";
  $stmt2=$conn->prepare($sql2);
  $stmt2->execute();
  $count2=$stmt2->rowCount();
  $row2=$stmt2->fetch(PDO:: FETCH_ASSOC);

  $sql1="SELECT * FROM e_dukan.addedto WHERE pid='$product_id' AND buyerID='$buyerID'";
  $stmt1=$conn->prepare($sql1);
  $stmt1->execute();
  $count1=$stmt1->rowCount();
  if($count1==0){
    $pname=$row2['pname'];
    $price=$row2['price'];
    $image=$row2['imageLocation'];
    $sql="INSERT INTO e_dukan.addedto VALUE('$product_id','$buyerID','$pname','$price','$image')";
       
    $stmt=$conn->prepare($sql);
    $stmt->execute();

  }
  else{
    ?>  
             
    <script>
        window.alert("This Product is Allready Added ."); 
   </script>  
   
    <?php
  }



  

  
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <!-- Bootstrep cdn -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   <link rel="stylesheet" href="style.css">

  </head>
  <body>
 
    <?php
require_once("php/AddtoCart.php");
    ?>

    <h1 style="text-align:center;">Welcome Home Page Cart</h1>
 <div class="container">
   <div class="row text-center py-5">  
    <?php
       
     $strm=$conn->query("select * from product");

     while($row=$strm->fetch(PDO:: FETCH_ASSOC))  {

     component("$row[pname]", "$row[imageLocation]" ,"$row[price]","$row[description]","$row[pid]" ,"$buyerID");
     }

    ?>
   </div>

 </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>