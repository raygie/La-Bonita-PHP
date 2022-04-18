<?php  
require '../includes/connection.php';
if(isset($_POST['submit'])){
    $prod_id = uniqid();
    $inputprod_name = $_POST['inputprod_name'];
    $inputprod_price= $_POST['inputprod_price'];
    $inputprod_link = $_POST['inputprod_link'];
    $inputprod_category = $_POST['inputprod_category'];
    $inputprod_desc = $_POST['inputprod_desc'];
    $prod_image = $_FILES["prod_image"]['name'];

    if(file_exists("prodpic/".$_FILES["prod_image"]["name"])){
        $store = $_FILES["prod_image"]["name"];
        $_SESSION['status'] = "Image Already Exists. '.$store.'";
        header('Location: ../allproducts.php');
    }
    else{
        $sql = "INSERT INTO products (id,prod_name,prod_price,link,prod_category,prod_desc,prod_image) values('$prod','$inputprod_name','$inputprod_price','$inputprod_link','$inputprod_category','$inputprod_desc','$prod_image')";
        
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($_FILES["prod_image"]["tmp_name"], "prodpic/".$_FILES["prod_image"]["name"]);
            $_SESSION['success'] = "Product Added";
            header('Location: ../allproducts.php');
        }
        else{
            $_SESSION['success'] = "Product Not added";
            echo "Error : ".$conn->error;
        }
    }
}
?>