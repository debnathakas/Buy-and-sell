<?php

function component($productname,$productImage, $productPrice,$desciption,$product_id,$buyerID){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
      <form action='./Home.php?buyerID=$buyerID' method=\"post\">
        <div class=\"card shadow\">
            <div>
                <img src=\"$productImage\" alt=\"image1\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">$productname</h5>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"far fa-star\"></i>
                </h6>
                <p class=\"card-text\">
                    $desciption
                </p>
                
                <h4>
                <small><s class=\"text-secondary\">₹</s></small>
                <span class=\"price\">$productPrice</span>
                <h3>
                <button type=\"submit\" class=\"btn btn-warning my-3\"name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                <input type=\"hidden\" name=\"product_id\" value=\"$product_id\"> 
            </div>
        </div>
      </form>
    </div>

    
    ";
    echo $element;
}


function cartElement($buyerID,$productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"../Cart/myCart.php?buyerID=$buyerID&action=remove&productID=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">₹$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
<<<<<<< HEAD
?>

=======


function cartElement_afterOrader($buyerID,$productimg, $productname, $productprice, $productid,$paymentDate,$paymentID){
    $element = "
    
    <form action=\"../Cart/myCart.php?buyerID=$buyerID&action=remove&productID=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">₹$productprice</h5>
                                <h5 class=\"btn btn-info mx-2\">Payment ID</h5>
                                <h5 class=\"btn btn-info mx-2\">$paymentID</h5>
                                <br>
                                <h5 class=\"btn btn-info mx-2\">Payment Date</h5>
                                <h5 class=\"btn btn-info mx-2\">$paymentDate</h5>
                               
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
?>
>>>>>>> c732502 (Second Commit)
