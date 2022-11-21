<?php

// start session
// session_start();

require_once("php1/component1.php");
include '../DatabaseConn.php';

require_once("sellerHomepage.php");

if(isset($_POST["add"])){
   print_r($_POST["product_id"]);
   
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

   <link rel="stylesheet" href="style1.css">

  </head>
  <body>


    <h1 style="text-align: center;">Your Product are </h1>
 <div class="container">
   <div class="row text-center py-5">  
    <?php

    $sellerID=$_GET["sellerID"];


     $strm=$conn->query("select * from e_dukan.product WHERE sellerID='$sellerID'");

     while($row=$strm->fetch(PDO:: FETCH_ASSOC))  {

     component("$row[pname]", "$row[imageLocation]" ,"$row[price]","$row[description]","$row[pid]" );
     }

    ?>
   </div>

 </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>