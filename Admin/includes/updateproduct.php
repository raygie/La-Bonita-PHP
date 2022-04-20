<?php  
require '../includes/connection.php';
if(isset($_POST['update_btn'])){
    $edit_id = $_POST['edit_id'];
    $inputprod_name = $_POST['edit_inputprod_name'];
    $inputprod_price= $_POST['edit_inputprod_price'];
    $inputprod_link = $_POST['edit_inputprod_link'];
    $inputprod_category = $_POST['edit_inputprod_category'];
    $inputprod_desc = $_POST['edit_inputprod_desc'];
    $prod_image = $_FILES["prod_image"]['name'];

    
        $sql = "UPDATE products SET prod_name = '$inputprod_name',prod_price = '$inputprod_price', link ='$inputprod_link', prod_category = '$inputprod_category', prod_desc = '$inputprod_desc', prod_image = '$prod_image' WHERE id = '$edit_id'";
        
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($_FILES["prod_image"]["tmp_name"], "prodpic/".$_FILES["prod_image"]["name"]);
            header('Location: ../allproducts.php');
        }
        else{
            echo "Error : ".$conn->error;
        }
    
}
?>