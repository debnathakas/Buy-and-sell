<?php


include '../../DatabaseConn.php';
require_once ("../php/component.php");
// require_once("../buyerhomepage.php");
$buyerID=$_GET["buyerID"];



if(isset($_POST["remove"])){
    $productID=$_GET["productID"];
    $buyerID=$_GET["buyerID"];
    // DELETE FROM `users` WHERE 0
    $sql="DELETE FROM addedto WHERE pid='$productID' AND buyerID='$buyerID'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    if($stmt){
        ?>
        <script>
        window.alert("Successfully Remove.");
        </script>
        <?php
    }
    else{
        ?>
        <script>
     window.alert("Not Remove.");
     </script>
     <?php
    }


}


?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
</head>
<body class="bg-light">

<div class="nav">
     <a class="btn btn-info" aria-current="page"name="home" href="../buyerhomepage.php" style="position:absolute; right:240px">Back To Home</a>                 
 </div>

    <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart </h6>

                <?php
                        
                        $sql1="Select * from addedto buyerID";
                        $stmt1=$conn->prepare($sql1);
                        $stmt1->execute();
                        $count=$stmt1->rowCount();
                        $total=0;
                        if($count!=0){
                        while($row=$stmt1->fetch(PDO :: FETCH_ASSOC)){
                        if($row["buyerID"]==$buyerID){
                            $image='../../Seller/'.$row['imageLocation'];
                            
                                    cartElement($buyerID,$image, $row['pname'],$row['price'], $row['pid']);
                                    $total = $total + $row['price'];
                                
                            }
                        }
                    }
                    else{
                        echo "<h5>Cart is Empty</h5>";
                    }
                   ?>
                

            </div>
        </div>
        
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            
                                echo "<h6>Price ($count items)</h6>";
                        
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                        <h6>Pay</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₹<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>₹<?php
                            echo $total;
                            ?></h6>
                            <h6>
                            <a class="btn btn-info" href="../EDukanTranjection?buyerID=<?php echo"$buyerID"?>&Price=<?php echo"$total"?>">Go For Pay</a> 
                            </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>