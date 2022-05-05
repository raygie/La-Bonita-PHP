<?php
    $id = $_GET['id'];
    require '../includes/connection.php';
    $sql = "INSERT INTO products_archive SELECT * from products WHERE id='$id'";
    $sqll = "DELETE from products WHERE id='$id'";
    
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
            }
    else{
        if($conn->query($sql) & $conn->query($sqll) ){
            unlink($path);
            header("Location:../all-products.php");
        }
        else{
            echo "Error deleting record: ".$conn->error;
        }
    }
?>
