<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a=10;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include 'includes/title.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <?php include 'includes/topbar.php'; ?>
   
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-5">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark mt-2">Add New Testimonials</h1>
              </div>
            </div>
          </div>
        </div>
      <div class="card card-outline card-info">
        <div class="card-header">
            <form action="includes/addtestimonial.php" method="post" class="row g-3" autocomplete="off" enctype="multipart/form-data" >
            
              <div class="col-md-6">
                <label for="input_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="input_name" name="input_name" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="" required/>
              </div>
              <div class="col-md-6">
                <label for="input_position" class="form-label">Position</label>
                <input type="text" class="form-control" id="input_position" name="input_position" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="" required/>
              </div>
              <div class="col-md-12">
                <label for="input_testi" class="form-label">Testimonials</label>
                <textarea class="form-control" id="input_testi" rows="5" value="" name="input_testi"required></textarea>
              </div>
              <div class="col-md-12 mt-3 mb-3">
              <label for="testi_image" class="form-label">Image</label>
              <input class="fadfa" type="file" id="testi_image" name="testi_image" value="">
                  <img src="" width="120">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit" >Save</button>
                <button type="Reset" value="Reset" class="btn btn-secondary">Clear</button>
              </div>
            </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
</body>
</html>
