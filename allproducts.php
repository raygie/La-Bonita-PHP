<?php
include 'includes/connection.php';
$a=1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bonita Cosmetics</title>

    <!-- Favicons -->
    <link href="assets/img/Labonita.png" rel="icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'includes/navbar.php';?>
<div class="content-wrapper">
    <div class="section">
        
        <div class="row">
            <?php
                $sql = "SELECT * FROM products ORDER BY date_created desc";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-4">
                <div class="card mb-3" style="width: 18rem;">
                    <?php echo '<img class="card-img-top" src="admin/includes/prodpic/'.$row['prod_image'].'" width="100px;"'?>
                    <div class="card-body">
                        <h5 class="card-title mt-2" style="font-size: 15px;"><?= $row['prod_name'];?></h5>
                        <p class="card-text text-danger">Price: <?= $row['prod_price'];?></p>
                        <a href="#" class="card-link mb-2">See details...</a>
                        <a class="btn btn-success mb-3" target="_blank" href="<?= $row['link'];?>">Shop Now!</a>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
</div>
    
    <script src="plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>