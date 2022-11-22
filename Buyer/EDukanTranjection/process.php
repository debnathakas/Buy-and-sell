<?php
session_start();
require_once("../../DatabaseConn.php");

$buyerId=$_GET["buyerID"];
$Total_Amount=$_GET["Price"];
$paymentMessage = '';
if(!empty($_POST['stripeToken'])){
    
	// get token and user details
    
    $sql1="SELECT * FROM e_dukan.buyer WHERE buyerID='$buyerId'";
    $stmt1=$conn->prepare($sql1);
    $stmt1->execute();
    $count1=$stmt1->rowCount();
    $row1=$stmt1->fetch(PDO:: FETCH_ASSOC);
    
    $customerName =$row1["bname"];
    $customerEmail =$row1["email"];
	$customerAddress = $row1['address'];
	// $customerCity = $_POST['customerCity'];
	// $customerZipcode = $_POST['customerZipcode'];
	// $customerState = $_POST['customerState'];
	// $customerCountry = $_POST['customerCountry'];
	
    $stripeToken  = $_POST['stripeToken'];
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    



    
	//include Stripe PHP library
    require_once('stripephp/init.php'); 
	
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"=>"sk_test_51M4rnuSFaR5B9Dce5FNa8Kw47pZhm9LxaARTsRM6nKmS18jwRbdQeyZiQHicnrtBw6OA05VZisFtynVODjnOsHD300syKEX9Sx",
      "publishable_key"=>"pk_test_51M4rnuSFaR5B9DceBCZi7WfYs5kpazBm2lqXp9pwhjTL4GhlOwpGhrHB96z6svvI7VyHmBhj01yUQAnl1s6HahVW00jMkIqXsT",
    );    
	
    // \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    
	//add customer to stripe
    // $customer = \Stripe\Customer::create(array(
	// 	'name' => $customerName,
	// 	'description' => 'test description',
    //     'email' => $customerEmail,
    //     'source'  => $stripeToken,
	// 	"address" => $customerAddress,
    // ));  
    
	
<<<<<<< HEAD
    
	   $insertTransactionSQL = "INSERT INTO e_dukan.payment(`buyerID`, `aid`, `paymentamount`, `paymentDate`, `paymentID`) VALUES ('$buyerId','212123004','$Total_Amount','','')";
		
=======
       $paymentid=rand(1000000,5000000);
    
	   $insertTransactionSQL = "INSERT INTO e_dukan.payment(`buyerID`, `aid`, `paymentamount`, `paymentDate`, `paymentID`) VALUES ('$buyerId','212123004','$Total_Amount',Current_TimeStamp,'$paymentid')";
		// $date=Current_TimeStamp();
>>>>>>> c732502 (Second Commit)
        
        $stmt=$conn->prepare($insertTransactionSQL);
        $stmt->execute();
        
<<<<<<< HEAD
=======
        

>>>>>>> c732502 (Second Commit)
       //    if order inserted successfully
       if($stmt->rowCount()>0 ){
           $sql2="SELECT * FROM e_dukan.addedto WHERE buyerID='$buyerId'";
           $stmt2=$conn->prepare($sql2);
           $stmt2->execute();
           $count2=$stmt2->rowCount();
        //    $data1=array();
        while($row=$stmt2->fetch(PDO:: FETCH_ASSOC)){
            // $data[]=$row["pid"];
            $pid=$row["pid"];
            $sql4="SELECT * FROM e_dukan.product WHERE pid='$pid'";
            $stmt4=$conn->prepare($sql4);
            $stmt4->execute();
            $row4=$stmt4->fetch(PDO:: FETCH_ASSOC);
<<<<<<< HEAD
            $price=$row['price'];



            $sql3="INSERT INTO e_dukan.payproduct VALUE('$pid','$buyerId','$price')";
=======
            $price0=$row4['price'];

            $sql3="INSERT INTO e_dukan.payproduct VALUE('$pid','$buyerId',Current_TimeStamp,'$paymentid','$price0')";
>>>>>>> c732502 (Second Commit)
            $stmt3=$conn->prepare($sql3);
            $stmt3->execute();

    
        }


            $paymentMessage = "The payment was successful.";
       } else{
          $paymentMessage = "failed";
       }
	   
    // } else{
    //     $paymentMessage = "failed";
    //     echo"Falied";
    // }
} else{
    $paymentMessage = "failed";
}




$_SESSION["message"] = $paymentMessage;
header('location:index.php?buyerID='.$buyerId.'&Price='.$Total_Amount);

?>
