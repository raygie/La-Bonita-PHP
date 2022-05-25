<?php
$id = $_GET['id'];

require '../includes/connection.php';
$sql = "DELETE from products_archive WHERE id='$id'";

if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    if ($conn->query($sql)) {
        // unlink($path);
        header("Location:../prod-recent-deleted.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}