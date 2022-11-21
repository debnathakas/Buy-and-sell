<?php
session_start();
require_once("myCart.php");
// include '../../DatabaseConn.php';
require_once ("../php/component.php");

$buyerID=$_GET["buyerID"];

?>



    <!-- <div class="container-fluid"> -->
        <div class="row px-5">
            <div class="col-md-7">
            <h3 class="text-center">Your Order Details</h3>
            <div class="shopping-cart">

                <?php
                        
                        $sql1="SELECT * FROM `payproduct` WHERE buyerID='$buyerID'";
                        $stmt1=$conn->prepare($sql1);
                        $stmt1->execute();
                        $count=$stmt1->rowCount();
                        $total=0;
                        if($count!=0){
                        while($row=$stmt1->fetch(PDO :: FETCH_ASSOC)){
                            
                            $pid=$row['pid'];
                            $sql2="SELECT * FROM `product` WHERE pid='$pid'";
                            $stmt2=$conn->prepare($sql2);
                            $stmt2->execute();
                            $count1=$stmt2->rowCount();
                            $row1=$stmt2->fetch(PDO :: FETCH_ASSOC);
                           
                        if($count1>0){
                            $image='../../Seller/'.$row1['imageLocation'];
                            
                                    cartElement($buyerID,$image, $row1['pname'],$row1['price'], $row1['pid']);
                                    $total = $total + $row1['price'];
                                
                            }
                        }
                    
                    }
                    else{
                        echo "<h5>Not Placed Order</h5>";
                    }
                   ?>
                

            </div>
        </div>
        
        <!-- <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        ?php
                            
                                echo "<h6>Price ($count items)</h6>";
                        
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                        <h6>Pay</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₹?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>₹?php
                            echo $total;
                            ?></h6>
                            <h6>
                            <a class="btn btn-info" href="../EDukanTranjection?buyerID=?php echo"$buyerID"?>&Price=?php echo"$total"?>">Go For Pay</a> 
                            </h6>
                    </div>
                </div>
            </div>

        </div> -->
    </div>








