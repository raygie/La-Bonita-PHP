<?php
$id = $_GET['id'];

    require '../includes/connection.php';
    $sql = "DELETE from testimonials WHERE id='$id'";
    
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
            }
  else{
    if($conn->query($sql)){
        // unlink($path);
        header("Location:../all-testimonial.php");
    }
    else{
        echo "Error deleting record: ".$conn->error;
    }
}
?>