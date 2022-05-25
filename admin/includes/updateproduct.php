<?php
require '../includes/connection.php';
if (isset($_POST['update_btn'])) {
    $edit_id = $_POST['edit_id'];
    $inputprod_name = $_POST['edit_inputprod_name'];
    $inputprod_price = $_POST['edit_inputprod_price'];
    $inputprod_link = $_POST['edit_inputprod_link'];
    $inputprod_category = $_POST['edit_inputprod_category'];
    $inputprod_desc = $_POST['edit_inputprod_desc'];

    $prod_image = $_FILES["prod_image"]['name'];

    $img_query = "SELECT * FROM products WHERE id = '$edit_id'";
    $img_query_run = mysqli_query($conn, $img_query);
    foreach ($img_query_run as $img_row) {
        if ($prod_image == NULL) {
            $image_data = $img_row['prod_image'];
        } else {
            if ($img_path = "prodpic/" . $img_row['prod_image']) {
                unlink($img_path);
                $image_data = $prod_image;
            }
        }
    }

    $sql = "UPDATE products SET prod_name = '$inputprod_name',prod_price = '$inputprod_price', link ='$inputprod_link', prod_category = '$inputprod_category', prod_desc = '$inputprod_desc', prod_image = '$image_data' WHERE id = '$edit_id'";

    if (mysqli_query($conn, $sql)) {
        if ($prod_image == NULL) {
            header('Location: ../all-products.php');
        } else {
            move_uploaded_file($_FILES["prod_image"]["tmp_name"], "prodpic/" . $_FILES["prod_image"]["name"]);
            header('Location: ../all-products.php');
        }
    } else {
        echo "Error : " . $conn->error;
    }
}