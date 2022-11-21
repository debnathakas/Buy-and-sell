<?php

// start session


include "../DatabaseConn.php";
require_once("cchomepage.php");
require_once("phpc/componentallbuyer.php");

// echo "$buyerID";

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
 

    <h1 style="text-align:center;">Welcome To AllBuyer Page</h1>
 <div class="container">
   <div class="row text-center py-5">  
    <?php
       
     $strm=$conn->query("select * from payproduct ");

     while($row=$strm->fetch(PDO:: FETCH_ASSOC))  {
        $pid=$row["pid"];
        $buyerId=$row["buyerID"];
        $sql2="SELECT * FROM `product` WHERE pid='$pid'";
        $stmt2=$conn->prepare($sql2);
        $stmt2->execute();
        $count1=$stmt2->rowCount();
        $row1=$stmt2->fetch(PDO :: FETCH_ASSOC);

        $sql3="SELECT * FROM e_dukan.buyer WHERE buyerID='$buyerId'";
        $stmt3=$conn->prepare($sql3);
        $stmt3->execute();
        $count2=$stmt3->rowCount();
        $row2=$stmt3->fetch(PDO :: FETCH_ASSOC);


         if($row1>0){
        $image="../Seller/".$row1['imageLocation'];
        componentallbuyer("$row[buyerID]", $image ,"$row1[pname]","$row1[price]","$row1[pid]","$row1[description]","$row2[bname]","$row2[email]","$row2[contactNo]","$row2[address]");
         }
     }

    ?>
   </div>

 </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>