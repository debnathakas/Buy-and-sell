<?php
require_once("../DatabaseConn.php");
require_once("cchomepage.php");

?>
<div class=".container col-md-6 offset-md-1 border rounded mt-5 bg-white ">
<div class="pt-4 ">
    <h6>Details of All Buyer</h6>
    <hr>
    <?php
 
        $sql1="SELECT * FROM e_dukan.payment";
        $stmt1=$conn->prepare($sql1);
        $stmt1->execute();
        $count1=$stmt1->rowCount();
        while($row=$stmt1->fetch(PDO:: FETCH_ASSOC)){
 
      ?>
     
    <div class="row price-details">
        <div class="col-md-5">
            <h6>BuyerID</h6>
            <h6>Buyer Name</h6>
            <h6>Buyer Email</h6>
            <h6>Buyer ContactNo</h6>
            <h6>Total_Amount</h6>
            <h6>Buyer Address</h6>
            <h6>All Product</h6>
        </div>
        <div class="col-md-6">
            <h6 class="text-success"><?php echo"$row[buyerID]" ?></h6>
            <?php
                $buyerid=$row['buyerID'];
            $sql2="SELECT * FROM e_dukan.buyer WHERE buyerID='$buyerid'";
            $stmt2=$conn->prepare($sql2);
            $stmt2->execute();
            $count2=$stmt2->rowCount();
            $row2=$stmt2->fetch(PDO:: FETCH_ASSOC)

             ?>


            <h6 class="text-success"><?php echo"$row2[bname]" ?></h6>
            <h6 class="text-success"><?php echo"$row2[email]" ?></h6>
            <h6 class="text-success"><?php echo"$row2[contactNo]" ?></h6>
            <h6 class="text-success"><?php echo"$row[paymentamount]" ?>₹</h6>
            <h6 class="text-success"><?php echo"$row2[address]" ?></h6>

            <?php
            $buyerid=$row['buyerID'];
            $sql3="SELECT * FROM e_dukan.payproduct WHERE buyerID='$buyerid'";
            $stmt3=$conn->prepare($sql3);
            $stmt3->execute();
            $count3=$stmt3->rowCount();
            while($row3=$stmt3->fetch(PDO:: FETCH_ASSOC)){
                ?>
               <h6 class="text-success"><?php echo"$row3[pid]" ?></h6>
               <?php
            }

             ?>

        </div>
      
        

    </div>
    <hr>

    <?php
    }
    ?>

</div>

</div>


<div class=".container col-md-6 offset-md-1 border rounded mt-5 bg-white ">
<div class="pt-4 ">
    <h6>Details of All Seller</h6>
    <hr>
    <?php
 
        $sql4="SELECT * FROM e_dukan.payproduct";
        $stmt4=$conn->prepare($sql4);
        $stmt4->execute();
        $count4=$stmt4->rowCount();
        while($row4=$stmt4->fetch(PDO:: FETCH_ASSOC)){
            $pid=$row4['pid'];  
            $sql5="SELECT * FROM e_dukan.product WHERE pid='$pid'";
            $stmt5=$conn->prepare($sql5);
            $stmt5->execute();
            $count5=$stmt5->rowCount();
            $row5=$stmt5->fetch(PDO:: FETCH_ASSOC);
      ?>
     
    <div class="row price-details">
        <div class="col-md-5">
            <h6>ProductID</h6>
            <h6>SellerID</h6>
            <h6>Seller Name</h6>
            <h6>Seller Email</h6>
            <h6>Seller ContactNo</h6>
            <h6>Total_Amount</h6>
           
        </div>
        <div class="col-md-6">
            
            <?php
            $sellerid=$row5['sellerID'];
            $sql6="SELECT * FROM e_dukan.seller WHERE sellerID='$sellerid'";
            $stmt6=$conn->prepare($sql6);
            $stmt6->execute();
            $count6=$stmt6->rowCount();
            $row6=$stmt6->fetch(PDO:: FETCH_ASSOC);
               
             ?>

            <h6 class="text-success"><?php echo"$pid" ?></h6>
            <h6 class="text-success"><?php echo"$sellerid" ?></h6>
            <h6 class="text-success"><?php echo"$row6[sname]" ?></h6>
            <h6 class="text-success"><?php echo"$row6[email]" ?></h6>
            <h6 class="text-success"><?php echo"$row6[contactNo]" ?></h6>
            <h6 class="text-success"><?php echo"$row5[price]" ?>₹</h6>

            
             

        </div>
      
        

    </div>
    <hr>

    <?php
    }
    ?>

</div>

</div>


