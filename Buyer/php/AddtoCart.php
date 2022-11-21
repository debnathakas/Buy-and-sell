
 <?php
    $buyerID=$_GET["buyerID"];

  ?>

<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="" class="navbar-brand">
        <h3>
          <i class="fas fa-shopping-basket"></i>Shopping Cart 
        </h3>
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"aria-expanded="false"aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: end;">
        <div class="mr-auto"></div>
        <div class="navbar-nav">
            <a href="./Cart/myCart.php?buyerID=<?php echo"$buyerID"  ?>" class="nav-item nav-link active">
               <h5 class="px-5 cart">
                    <i class="fas fa-shopping-cart"></i>Cart 
                    <span id="cart_count"class="text-warning bg-light" style="justify-content: end;
                      text-align:center; padding: 0 0.9rem 0.1rem 0.9rem;border-radius: 4rem;">
                    <?php
                    $buyerID=$_GET["buyerID"];
                    $sql1="SELECT * FROM e_dukan.addedto WHERE buyerID='$buyerID'";
                    $stmt1=$conn->prepare($sql1);
                    $stmt1->execute();
                    $count1=$stmt1->rowCount();
                    echo "$count1";

                    ?>
                    
                    </span>
                </h5>
            </a>
       </div>
</nav>
</header>