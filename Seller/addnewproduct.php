
<?php
include "../DatabaseConn.php";
// session_start();
require_once("sellerHomepage.php");

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
    <style>
      body{
        font-family: 'Lato', sans-serif;
    
      }
    </style>

  </head>
  <body>
 

    <div class="container d-flex justify-content-center margin-top:20px bg-light p-4">
   
   <form class="bg-info p-5" method="post" action="" enctype="multipart/form-data">
   <h2>Add Product</h2>
   <div class="mb-2">
     <label for="pid" class="form-label">Product ID*</label>
     <input type="text" class="form-control" id="pid" name="pid" placeholder="Manuf. no./ serial no." required>
    
   </div>
   <div class="mb-2">
     <label for="paname" class="form-label">Product Name*</label>
     <input type="text" class="form-control" id="pname" name="pname" required>
    
   </div>
 
   <div class="mb-2">
     <label for="image1" class="form-label">Upload an Image*(image type: jpg, png, jpeg, gif)</label>
     <input type="file" class="form-control" id="image1" name="image1" required>
    
   </div>

   <div class="mb-2">

     Price*(in Rs.) <br>
            <span style="color:red;"> <b>IMPORTANT</b>  You will get 95% of it in your wallet when the product gets sold!</span><br>
            <input type="number" class="form-control" id="price" name="price" required>
   </div>
      
   <div class="mb-2">
     <label for="category" class="form-label">Category</label>
            <br>
            <select name="category" id="category">
                <option value="mobile">Mobile</option>
                <option value="laptop">Laptop</option>
                <option value="book">Book</option>
                <option value="electronic">Electronic Devices</option>
                <option value="bathroom">Bathroom Essentials</option>
                <option value="bedroom">Bedroom Stuff</option>
                <option value="decoration">Decoration Stuff</option>
                <option value="cycle">Cycle</option>
                <option value="other">Other</option>
            </select>

   </div>
 
   <div class="mb-2">
     <label for="description" class="form-label">Description*(in under 20 words)</label>
     <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
   </div>

            <!-- Upload Image2
            <p>
                <input type="file" name="image2" multiple>  
                <br>
            </p>
            Upload Image3
            <p>
                <input type="file" name="image3" multiple>  
                <br>
            </p> -->
           
            <div class="mb-2">
            <input type="submit" class="btn btn-primary " name="submit" value="Upload to website"> 
            <input type="reset" value="Reset" name="reset"class="btn btn-primary ">
            </div>
   
 </form>
 </div>
 






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

<?php

$sellerID=$_GET["sellerID"];


try{
$statusMsg="";

//File upload path
$target_dir="image/";
$fileName=($_FILES['image1']['name']);
$targerFile_Path=$target_dir.$fileName;
$fileType=pathinfo($targerFile_Path,PATHINFO_EXTENSION);

  if(isset($_POST["submit"])){
      //Chaecking for empty filed

      if(($_POST["pid"]==" ") || ($_POST["pid"]==" ") || ($_POST["pname"]==" ") || ($_POST["category"]==" ") || ($_POST["description"]==" ")|| ($_POST["price"]==" ")){
        echo '<script>alert("Fill all Fields")</script>';
      }
      else{
        $pid=$_POST["pid"];

        $sql2="SELECT * FROM e_dukan.product WHERE pid='$pid'";
        $stmt2=$conn->prepare($sql2);
        $stmt2->execute();
        $count2=$stmt2->rowCount();
     

        if($count2==0){
      if(!empty($_FILES['image1']['name'])){
          //  $statusMsg="You File is not uploded";
      //Allow certain file formats
      $allowType=array('jpg','png','jpeg','gif');
      if(in_array($fileType,$allowType)){
        //Upload file to server
        if(move_uploaded_file($_FILES['image1']["tmp_name"],$targerFile_Path)){


         $pid=$_POST["pid"];
         $pname=$_POST["pname"];
         $price=$_POST["price"];
         $category=$_POST["category"];
         $description=$_POST["description"];
       
         
        // $sql2="SELECT * FROM e_dukan.seller WHERE sellerID='$uid'";
        // $stmt2=$conn->prepare($sql2);
        // $stmt2->execute();
        // $row=$stmt2->fetch(PDO:: FETCH_ASSOC);
        



         $sql="INSERT INTO e_dukan.product VALUES('$sellerID','$pid','$pname','$price','$category','$description','image/$fileName',1,1)";
          $res=$conn->prepare($sql);
          $res->execute();
          // print_r($res);
          if($res){
            ?>
            <script>
               window.alert("Product Uploded Successfully");
            </script>
           
           <?php
        }else{
            $statusMsg = "File upload failed, please try again.";
        } 
      }
      else{
        $statusMsg = "Sorry, there was an error uploading your file.";
      }
    }
      else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
      }
  
    }
   else{
    $statusMsg='Please select a file to upload.';
   }


  }
  else{
    ?>
 <script>
    window.alert("This Product ID Alredy Exist");
 </script>

<?php
  }


}



  // Display status message
}
echo $statusMsg;

}
catch (PDOExcepion $e){
    echo $e->getMessage();
}



?>

