<?php
require '../includes/connection.php';
if (isset($_POST['update_btn'])) {
    $edit_id = $_POST['edit_id'];
    $input_name = $_POST['edit_input_name'];
    $input_position = $_POST['edit_input_position'];
    $input_testi = $_POST['edit_input_testi'];

    $testi_image = $_FILES["testi_image"]['name'];

    $img_query = "SELECT * FROM testimonials WHERE id = '$edit_id'";
    $img_query_run = mysqli_query($conn, $img_query);
    foreach ($img_query_run as $img_row) {
        if ($testi_image == NULL) {
            $image_data = $img_row['testi_image'];
        } else {
            if ($img_path = "testipic/" . $img_row['testi_image']) {
                unlink($img_path);
                $image_data = $testi_image;
            }
        }
    }

    $sql = "UPDATE testimonials SET input_name = '$input_name',input_position = '$input_position', input_testi = '$input_testi', testi_image = '$image_data' WHERE id = '$edit_id'";

    if (mysqli_query($conn, $sql)) {
        if ($testi_image == NULL) {
            header('Location: ../all-testimonial.php');
        } else {
            move_uploaded_file($_FILES["testi_image"]["tmp_name"], "testipic/" . $_FILES["testi_image"]["name"]);
            header('Location: ../all-testimonial.php');
        }
    } else {
        echo "Error : " . $conn->error;
    }
}