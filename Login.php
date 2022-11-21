<?php
include 'DatabaseConn.php';
session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<style>
  .body{
    /* background-image: url("https://www.jntufastupdates.com/wp-content/uploads/2017/07/gate-2018-notification.jpg"); */
    background-color:red;
  }
  </style>

  <body>
  <div class="container d-flex justify-content-center margin-top:20px bg-light p-3">
   
  <form style="margin-top:10% " class="bg-info p-3" id="Login" method="post" name="LogForm" onsubmit="return formValidationforLogin()" action="">
  <p id="demo"></p>
  <h2> Login Page</h2>
  <div class="mb-3">
    <label for="uid" class="form-label">UID</label>
    <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter your UID">
   
  </div>

  <div class="mb-3">
    <label for="IITG Webmail" class="form-label">IITG Webmail</label>
    <input type="email" class="form-control" id="IITG Webmail" name="email" placeholder="Enter your Webmail">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3 form-check" style=" padding-left:0;">
  <input type="radio" class="form-label" name="options" value="buyer" id="buyer" autocomplete="off" checked>
<label class="btn btn-secondary" for="buyer">Buyer</label>

<input type="radio" class="form-label" name="options" value="seller" id="seller" autocomplete="off">
<label class="btn btn-secondary" for="seller">Seller</label>

<input type="radio" class="form-label" name="options" value="cc"id="CC" autocomplete="off" checked>
<label class="btn btn-secondary" for="CC">Customer Care</label>

<input type="radio" class="form-label" name="options" value="admin"id="admin" autocomplete="off">
<label class="btn btn-secondary" for="admin">Admin</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
  <div class="mb-3">
    <p>Not Registation Yet? Click<a href="Register.php">Registation</a>.</p>
  </div>
</form>
</div>

<script src="login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


<?php

if(isset($_POST["submit"])){
     $uid=$_POST["uid"];
     $email=$_POST["email"];
     $pass=$_POST["pass"];
     $user_type=$_POST["options"];
     


    $sql1="SELECT * FROM e_dukan.users WHERE email='$email' AND userid='$uid' AND  pass='$pass'";
    $stmt1=$conn->prepare($sql1);
    $stmt1->execute();
    $count1=$stmt1->rowCount();
    $row=$stmt1->fetch(PDO:: FETCH_ASSOC);


    $sql2="SELECT * FROM e_dukan.users WHERE email='$email' AND userid='$uid'";
    $stmt2=$conn->prepare($sql2);
    $stmt2->execute();
    $count2=$stmt2->rowCount();

    $sql3="SELECT * FROM e_dukan.users WHERE userid='$uid'";
    $stmt3=$conn->prepare($sql3);
    $stmt3->execute();
    $count3=$stmt3->rowCount();


    $sql4="SELECT * FROM e_dukan.users WHERE email='$email'";
    $stmt4=$conn->prepare($sql4);
    $stmt4->execute();
    $count4=$stmt4->rowCount();


    if($count1==1){
      ?>

          
      <script>
     window.alert("Login Successful.");
     </script> 
       <?php
                if($user_type=='buyer'){
            
                    $_SESSION['userid']=$uid;
                    header("Location:Buyer/buyerhomepage.php");
                    exit;
                    // Insert link later
                }
                else if($user_type=='seller'){
                  $_SESSION['userid']=$uid;
                    header("Location:Seller/sellerhomepage.php");
                    exit;
                }
                else if($user_type=='cc'){
                  $sql5="SELECT * FROM e_dukan.customercare WHERE email='$email' AND ccid='$uid' AND  pass='$pass'";
                  $stmt5=$conn->prepare($sql5);
                  $stmt5->execute();
                  $count5=$stmt5->rowCount();
                  $row5=$stmt5->fetch(PDO:: FETCH_ASSOC);
                
                  if($count5==1){
                  $_SESSION['userid']=$uid;
                    header("Location:CustomerCare/cchomepage.php");
                    exit;
                  }
                  else{
                    ?>
          
                          <script>
                        window.alert("Not Match Customer Care Detiles .");
                        </script>
                        <?php
                  }
                }
                else if($user_type=='admin'){
                  $sql6="SELECT * FROM e_dukan.admin WHERE email='$email' AND aid='$uid' AND  pass='$pass'";
                  $stmt6=$conn->prepare($sql6);
                  $stmt6->execute();
                  $count6=$stmt6->rowCount();
                  $row6=$stmt6->fetch(PDO:: FETCH_ASSOC);
                   
                   if($count6==1){
                  $_SESSION['userid']=$uid;
                    header("Location:Admin/ahomepage.php");
                    exit;
                }
                else{
                  ?>
                  <script>
                  window.alert("Not Match Admin Detiles .");
                  </script>
                  <?php
                }
              }
             
                
    }
    else if($count1==0 and $count2==0 and $count3==0 and $count4==0){
      ?>
          
      <script>
     window.alert("Your are not Register so go the Registation Page.");
     </script>
     <?php
    }
  
    else if($count2>0){
      ?>
          
      <script>
     window.alert("Incorrect Password.");
     </script> 
  
       <?php

    }

    else if($count3>0){
      ?>
          
      <script>
     window.alert("Incorrect Email.");
     </script> 
  
       <?php

    }

    else if($count4>0){
      ?>
          
      <script>
     window.alert("Incorrect UID.");
     </script> 
  
       <?php

    }


}



?>



