<?php

function component($sellerID,$productimg, $productname, $productprice, $productid,$desciption){
    $element = "
    
    <form action=\"../Cart/myCart.php?buyerID=$sellerID&action=remove&productID=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">$desciption</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <h5 class=\"btn btn-warning\">Sellar ID</h5>
                                <h5 class=\"btn btn-danger mx-2\" name=\"remove\">$sellerID</h5>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <h5 class=\"btn btn-warning\">Total No Product</h5>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}



?>