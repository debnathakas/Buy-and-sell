<?php
$username="root";
$password="";
$db_name="mysql:host=localhost;dbname=e_dukan";
$conn=new pdo($db_name,$username,$password);

if($conn){
    // echo "Database Connected";
}
else{
    echo "Database fail to connected";
}


?>