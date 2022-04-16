<?php  
require 'includes/connection.php';
// Service
if(isset($_POST['prod_id'])){
    // Customer Info
    $prod_id = uniqid();
    $inputprod_name = $_POST['inputprod_name'];
    $inputprod_price= $_POST['inputprod_price'];
    $inputprod_link = $_POST['inputprod_link'];
    $inputprod_category = $_POST['inputprod_category'];
    $inputprod_desc = $_POST['inputprod_desc'];
    $inputprod_image = $_POST['inputprod_image'];

    $sql = "insert into products (id,prod_name,prod_price,prod_desc,prod_category,prod_image,link) values('$prod_id','$inputprod_name','$inputprod_price','$inputprod_link','$inputprod_category','$inputprod_desc','$inputprod_image')";
    
if(mysqli_query($conn, $sql))
    header('Location: allproducts.php?id='.$prod_id);
    $conn->close(); 
}
else{
    echo "Error : ".$conn->error;
}