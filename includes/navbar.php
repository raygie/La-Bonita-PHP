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
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
<body>
  <!-- <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="#">La Bonita</a></h1>
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Testimonials</a></li>
          </ul> 
        </nav>
    </div>
  </header> -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <h1 class="logo mr-auto"><a href="#">La Bonita</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="#">About</a></li>
          <li class="nav-link <?php if($a==1){ echo 'active'; }?>"><a href="allproducts.php">Products</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Testimonials</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>


  
  <script src="plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>