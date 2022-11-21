<?php
include'DatabaseConn.php';
session_start();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    
    
    <!-- <script src="registation.js"

</script> -->

  </head>
  <body>
  <div class="container d-flex justify-content-center margin-top:20px bg-light p-3">
   
  <form class="bg-info p-5" id="form" action="" onsubmit="return formValidation()" method="post" name="RegForm" >
  <p id="demo"></p>
  <h2>Registation Page</h2>
  <div class="mb-2">
    <label for="uid" class="form-label">UID</label>
    <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter your UID">
   
  </div>
  <div class="mb-2">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
   
  </div>

  <div class="mb-2">
    <label for="IITG Webmail" class="form-label">IITG Webmail</label>
    <input type="email" class="form-control" id="IITG_Webmail" name="email" placeholder="Enter your Webmail">
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Set Password</label>
    <input type="password" class="form-control" id="setpass" name="setpass">
  </div>
  <div class="mb-2 form-check" style=" padding-left:0;">
  <label for="occupation" class="form-label">Occupation</label>
  <input type="radio" class="form-label" name="options" value="student" id="student" autocomplete="off" checked>
<label class="btn btn-secondary" for="student">Student</label>

<input type="radio" class="form-label" name="options" value="staff"id="staff" autocomplete="off">
<label class="btn btn-secondary" for="staff">Staff</label>
  </div>

  <div class="mb-2">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Enter your Address">
  </div>

  <div class="mb-2">
    <label for="contact_no">Contact No</label>
    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your Phone no">
  </div>

  <div class="mb-2 form-check" style=" padding-left:0;">
  <label for="user_type" class="form-label">User_Type</label>
  <input type="radio" class="form-label" name="options1" value="buyer" id="buyer" autocomplete="off" checked>
<label class="btn btn-secondary" for="buyer">Buyer</label>

<input type="radio" class="form-label" name="options1" value="seller"id="seller" autocomplete="off">
<label class="btn btn-secondary" for="seller">Seller</label>

  </div>
  <button type="submit" class="btn btn-primary container d-flex justify-content-center" name="submit">Registation</button>
  <div class="mb-2">
    <p>Already have an account? Click here<a href="Login.php">Sign in</a>.</p>
  </div>
</form>
</div>
  </body>


  <script src="registation.js">
  </script>
  
  <!-- <script>
    // var name=document.getElementById("name").value;
    var name=document.forms['RegForm']["name"].value;
    if(name==""){
    document.getElementById("demo").innerHTML="<i>Please enter your name.</i>";
        document.getElementById("demo").style.color="Red";
        // return false;
      }
    </script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  
 </script>

</html>


<?php

try{
  if(isset($_POST["submit"])){
    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $setpass=$_POST["setpass"];
    $options=$_POST["options"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $user_type=$_POST["options1"];
  
    $sql1="SELECT * FROM e_dukan.users WHERE email='$email' AND userid='$uid'";
    $stmt1=$conn->prepare($sql1);
    $stmt1->execute();
    $count1=$stmt1->rowCount();
    // echo "$count1";

    $sql2="SELECT * FROM e_dukan.users WHERE userid='$uid'";
    $stmt2=$conn->prepare($sql2);
    $stmt2->execute();
    $count2=$stmt2->rowCount();
    // echo "$count2";

    $sql3="SELECT * FROM e_dukan.users WHERE email='$email'";
    $stmt3=$conn->prepare($sql3);
    $stmt3->execute();
    $count3=$stmt3->rowCount();
    // echo "$count3";

    if($count1>0){
        ?>  
             
    <script>
        window.alert("You are already registered. Click to login."); 
   </script>  
   
    <?php      
          
          // throw new Exception("You are already registered. Click to login.");
  }      
   else if($count2>0){
         ?>
                    
          <script>
          window.alert("This UID are already exist.");
          </script>
          <?php
   }      
    else if($count3>0){
        ?>
          
           <script>
          window.alert("This Webmail are already exist.");
          </script> 
  
        <?php
      }      
    else{
       ?>
          
    <script>
   window.alert("Successful Registation.");
   </script> 

     <?php
    $sql="INSERT INTO users VALUE('$uid','$name','$email','$setpass','0','$options','$address','$phone')";
     
    $stmt=$conn->prepare($sql);
    $stmt->execute();


if($user_type=='buyer'){
            
  $_SESSION['userid']=$uid;
  // $_SESSION['email'] = $email;
  // $_SESSION['user_type']=$user_type;
  header("Location:Buyer/buyerhomepage.php");
  exit;
  // Insert link later
}
else if($user_type=='seller'){
$_SESSION['userid']=$uid;
  // $_SESSION['email'] = $email;
  // $_SESSION['user_type']=$user_type;
  header("Location:Seller/sellerhomepage.php");
  exit;
}

    }

  }
  else{
         throw new Exception("Somthing Wrong.");
  }


}
catch(Exception $e){
  echo 'Message: ' .$e->getMessage();
}


?>







