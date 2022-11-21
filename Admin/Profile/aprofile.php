<?php


// session_start();
include '../../DatabaseConn.php';
// require_once("../sellerhomepage.php");

$aid=$_GET['aid'];
// echo "$userid";
$sql2="SELECT * FROM e_dukan.admin WHERE aid='$aid'";
$stmt2=$conn->prepare($sql2);
$stmt2->execute();
$row=$stmt2->fetch(PDO:: FETCH_ASSOC);                  
     
$name=$row['aname'];
$email=$row['email'];
// $walletBalance=$row['walletBalance'];
$contactNo=$row['contactNo'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> 
    
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="astyle.css">
</head>
<body>
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-2">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1><?php echo "$name" ?></h1>
              <p><?php echo "$email" ?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
              <li><a href="../ahomepage.php"> <i class="btn btn-info"></i>Back TO Home</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <div class="bio-graph-heading">
             WellCome To Admin Profile <Section>Your Details</Section>
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span> Name </span>: <?php echo "$name" ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Admin ID</span>: <?php echo "$aid"?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: Staff</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?php echo "$email" ?></p>
                  </div>
                  <!-- <div class="bio-row">
                      <p><span>Wallet Balance </span>:<php echo "$walletBalance" ?></p>
                  </div> -->
                  <div class="bio-row">
                      <p><span>Phone </span>: <?php echo "$contactNo" ?></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>