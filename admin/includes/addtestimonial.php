<?php  
require '../includes/connection.php';
if(isset($_POST['submit'])){
    
    $input_name = $_POST['input_name'];
    $input_position= $_POST['input_position'];
    $input_testi = $_POST['input_testi'];
    $testi_image = $_FILES["testi_image"]['name'];

    
        $sql = "INSERT INTO testimonials (input_name,input_position,input_testi,testi_image) values('$input_name',' $input_position','$input_testi','$testi_image')";
        
        if(mysqli_query($conn, $sql)){
            move_uploaded_file($_FILES["testi_image"]["tmp_name"], "testipic/".$_FILES["testi_image"]["name"]);
            header('Location: ../all-testimonial.php');
        }
        else{
            echo "Error : ".$conn->error;
        }
    
}
?>