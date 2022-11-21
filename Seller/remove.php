<?php

include '../DatabaseConn.php';

require_once("php1/component1.php");

$pid=$_GET["product_id"];
echo "$pid";

$sql = "DELETE FROM e_dukan.product WHERE pid='$pid'";

if ($conn->query($sql) == TRUE) {
  ?>
 <script>
    window.alert("Successfuly Remove the Product");
    
    header("Location:Seller/sellerhomepage.php");
    exit;

 </script>

<?php
} else {
    ?>
<script>
    window.alert(" Product is Not Remove");
 </script>

<?php
  
}


?>