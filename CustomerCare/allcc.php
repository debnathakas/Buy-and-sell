<?php
require_once("../DatabaseConn.php");
require_once("cchomepage.php");

?>
<div class=".container col-md-6 offset-md-1 border rounded mt-5 bg-white ">
<div class="pt-4 ">
    <h6>Details of All CustomerCare</h6>
    <hr>
    <?php
 
        $sql1="SELECT * FROM e_dukan.customercare";
        $stmt1=$conn->prepare($sql1);
        $stmt1->execute();
        $count1=$stmt1->rowCount();
        while($row=$stmt1->fetch(PDO:: FETCH_ASSOC)){
 
      ?>
     
    <div class="row price-details">
        <div class="col-md-5">
            <h6>CustomerCareID</h6>
            <h6>CustomerCare Name</h6>
            <h6>CustomerCare Email</h6>
            <h6>CustomerCare ContactNo</h6>
        </div>
        <div class="col-md-6">
            <h6 class="text-success"><?php echo"$row[ccid]" ?></h6>
            <h6 class="text-success"><?php echo"$row[ename]" ?></h6>
            <h6 class="text-success"><?php echo"$row[email]" ?></h6>
            <h6 class="text-success"><?php echo"$row[contactNo]" ?></h6>
        </div>
    </div>
    <hr>

    <?php
    }
    ?>

</div>

</div>


