<?php

require_once("../DatabaseConn.php");
session_start();
$ccid=$_SESSION["userid"];

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
          <a class="nav-link active btn btn-info" aria-current="page"name="home" href="cchomepage.php">Home</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="tranjections" href="Tranjections.php">Tranjections</a>
        </li>
        <li class="nav-item p-2">
           <a class="nav-link btn btn-info" name="all_buyers" href="allbuyers.php">All Buyers</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="all_sellers" href="allsellers.php">All Sellers</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="all_cc" href="allcc.php">All CC</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="all_products" href="allproduct.php">All Products</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link btn btn-info" name="profile" href="Profile/ccprofile.php?ccid=<?php echo"$ccid" ?>">Profile</a>
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

<h5 class="text-center text-success " id="e_dukan" >WellCome To E_Dukan CustomerCare</h5>

<script>


  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>