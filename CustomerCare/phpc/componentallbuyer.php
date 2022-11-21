<?php

function componentallbuyer($buyerID,$productimg, $productname, $productprice, $productid,$desciption,$sname,$email,$contactNo,$adderess){
    $element = "
    
    <div class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2 text-danger\">$productname</h5>
                                <small class=\"text-warning\">$desciption</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <div>
                                <h5 class=\"btn btn-primary mx-2\">Buyer ID</h5>
                                <h5 class=\"btn btn-info mx-2\">$buyerID</h5>
                                </div>
                                <div>
                                <h5 class=\"btn btn-primary mx-2\">Buyer Name</h5>
                                
                                <h5 class=\"btn btn-info mx-2\">$sname</h5>
                                </div>
                                <div>
                                <h5 class=\"btn btn-primary mx-2\">Buyer Email</h5>
                                
                                <h5 class=\"btn btn-info mx-2\">$email</h5>
                                </div>
                                <div>
                                <h5 class=\"btn btn-primary mx-2\">Buyer Contact No</h5>
                                
                                <h5 class=\"btn btn-info mx-2\">$contactNo</h5>
                                </div>
                                   
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <h5 class=\"btn btn-warning\">Total No Product</h5>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    ";
    echo  $element;
}



?>