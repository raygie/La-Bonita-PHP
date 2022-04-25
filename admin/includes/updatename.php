<?php
include '../includes/sessions.php';
require '../includes/connection.php';


if(!empty($_POST['newName']) && !empty($_POST['renewName'])){
    $name = $_POST['renewName'];
    if(!($_POST['newName']==$_POST['renewName'])){
        echo ' <p class="text-danger">Names does not match</p>';
    }
    else {
         $updatename = "update admin_login set name='$name' where admin_id='1'";
         $conn->query($updatename);    
         $_SESSION["username"]=$name;
         echo ' <p class="text-success">Succesfully Updated Name!</p>';
         
     }
}
else{
    echo ' <p class="text-danger">Please fill out all the forms</p>';
}