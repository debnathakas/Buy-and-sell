<?php

function component($productname,$productImage, $productPrice,$desciption,$product_id){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
      <form action='./remove.php?product_id=$product_id' method=\"post\">
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
                <button type=\"submit\" class=\"btn btn-warning my-3\"name=\"add\">Remove <i class=\"fas fa-shopping-cart\"></i></button>
                <input type=\"hidden\" name=\"product_id\" value=\"$product_id\"> 

                

            </div>
        </div>
      </form>
    </div>

    
    ";
    echo $element;
}


?>

