
<?php

include '../DatabaseConn.php';
session_start();
$uid=$_SESSION['userid'];
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
 

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid " id="navbarSupportedContent" style="    background-color: #cad0d3;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item p-2">
          <a class="nav-link active btn btn-info" aria-current="page"name="home" href="Home.php">Home</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="add_new_product" href="addnewproduct.php?sellerID=<?php echo"$uid"  ?>">Add New Product</a>
        </li>
        <li class="nav-item p-2">
           <a class="nav-link btn btn-info" name="my_product" href="myproduct.php?sellerID=<?php echo"$uid" ?>">My Product</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="contart_cc" href="ContactCC.php">Contact CC</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="profile" href="Profile/profile.php?userid=<?php echo"$uid"  ?>">Profile</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" href="../Logout.php">Logout</a>
        </li>
      </ul> 
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


<?php


$uid=$_SESSION['userid'];



  $sql1="SELECT * FROM e_dukan.seller WHERE userid='$uid'";
    $stmt1=$conn->prepare($sql1);
    $stmt1->execute();
    $count1=$stmt1->rowCount();
    if($count1==0){
    $sql2="SELECT * FROM e_dukan.users WHERE userid='$uid'";
    $stmt2=$conn->prepare($sql2);
    $stmt2->execute();
    $row=$stmt2->fetch(PDO:: FETCH_ASSOC);

    $email=$row['email'];
    $pass=$row['pass'];
    $name=$row['uname'];
    $occupation=$row['occupation'];
    $address=$row['address'];
    $contactNo=$row['contactNo'];

    // echo "$email";
    // echo "$pass";
    // echo "$name";
    // echo "$occupation";
    // echo "$contactNo";
         
      $sql="INSERT INTO e_dukan.seller VALUE('$uid','$name','$email','$pass','0','$occupation','$address','0','$contactNo')";
     
      $stmt=$conn->prepare($sql);
       $stmt->execute();
    }
    // echo "Seller id alredy esixt";



?>