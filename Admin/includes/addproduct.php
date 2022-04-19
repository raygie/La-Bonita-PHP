<?php  
require '../includes/connection.php';
if(isset($_POST['submit'])){
    
    $inputprod_name = $_POST['inputprod_name'];
    $inputprod_price= $_POST['inputprod_price'];
    $inputprod_link = $_POST['inputprod_link'];
    $inputprod_category = $_POST['inputprod_category'];
    $inputprod_desc = $_POST['inputprod_desc'];
    $prod_image = $_FILES["prod_image"]['name'];

    
        $sql = "INSERT INTO products (prod_name,prod_price,link,prod_category,prod_desc,prod_image) values('$inputprod_name','$inputprod_price','$inputprod_link','$inputprod_category','$inputprod_desc','$prod_image')";
        
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($_FILES["prod_image"]["tmp_name"], "prodpic/".$_FILES["prod_image"]["name"]);
            header('Location: ../allproducts.php');
        }
        else{
            echo "Error : ".$conn->error;
        }
    
}
?>