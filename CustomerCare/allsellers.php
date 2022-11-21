
<?php

// start session


include "../DatabaseConn.php";
require_once("cchomepage.php");
require_once("phpc/componentallseller.php");

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
 

    <h1 style="text-align:center;">Welcome To All Sellers Page</h1>
 <div class="container">
   <div class="row py-5">  
    <?php
       
     $strm=$conn->query("select * from product");

     while($row=$strm->fetch(PDO:: FETCH_ASSOC))  {
        $image="../Seller/".$row['imageLocation'];

        $sellerID=$row['sellerID'];
        $sql1="SELECT * FROM e_dukan.seller WHERE sellerID='$sellerID'";
        $stmt1=$conn->prepare($sql1);
        $stmt1->execute();
        $row1=$stmt1->fetch(PDO:: FETCH_ASSOC);

        componentallseller("$row[sellerID]", $image ,"$row[pname]","$row[price]","$row[pid]","$row[description]","$row1[sname]","$row1[email]","$row1[contactNo]","$row1[address]");
     }

    ?>
   </div>

 </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>