<?php
include '../includes/sessions.php';
require '../includes/connection.php';

$admin_image = $_POST['inputprod_image'];
if(empty($_POST['inputprod_image'])){
    echo ' <p class="text-danger">Upload New Image to Update</p>';
    }
    else {
    $updateimage = "update admin_login set admin_image='$admin_image' where admin_id='1'";
    $conn->query($updateimage);    
    $_SESSION["admin_image"]=$admin_image;
    echo ' <p class="text-success">Succesfully Updated Image!</p>';
}