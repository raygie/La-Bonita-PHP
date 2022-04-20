<?php
include 'includes/sessions.php';
include 'includes/connection.php';



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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
                <h1 class="m-0 text-dark mt-2">Edit Product</h1>
              </div>
            </div>
          </div>
        </div>
      <div class="card card-outline card-info">
        <div class="card-header">
            <?php
                if(isset($_POST['edit_data']))
                {
                    $id = $_POST['edit_id'];

                    $query = "SELECT * FROM products WHERE id='$id'";
                    $query_run = mysqli_query($conn,$query);

                    foreach($query_run as $prod)
                    {
                    ?>

                    
            <form action="includes/updateproduct.php" method="post" class="row g-3" autocomplete="off" enctype="multipart/form-data" >
            <input type="hidden" name="edit_id" value="<?php echo $prod['id']?>">
              <div class="col-md-6">
                <label for="edit_inputprod_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="edit_inputprod_name" name="edit_inputprod_name" value="<?php echo $prod['prod_name']?>" required/>
              </div>
              <div class="col-md-6">
                <label for="edit_inputprod_price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="edit_inputprod_price" name="edit_inputprod_price" value="<?php echo $prod['prod_price']?>" required/>
              </div>
              <div class="col-md-6">
                <label for="edit_inputprod_link" class="form-label">Link</label>
                <input type="text" class="form-control" id="edit_inputprod_link" name="edit_inputprod_link" value="<?php echo $prod['link']?>" required/>
              </div>
              <div class="col-md-6">
                <label for="edit_inputprod_category" class="form-label">Category</label>
                  <select
                    id="edit_inputprod_category"
                    name="edit_inputprod_category"
                    class="form-control"
                    
                  >
                    <option value="Retail/Samples"<?php if($prod['prod_category']=='Retail/Samples' ) echo 'selected' ?>>Retail/Samples</option>
                    <option value="Rebranding/Wholesale"<?php if($prod['prod_category']=='Rebranding/Wholesale' ) echo 'selected' ?>>Rebranding/Wholesale</option>
                    <option value="Others"<?php if($prod['prod_category']=='Others' ) echo 'selected' ?>>Others</option>
                  </select>
              </div>
              <div class="col-md-12">
                <label for="edit_inputprod_desc" class="form-label">Description</label>
                <textarea class="form-control" id="edit_inputprod_desc" rows="5" name="edit_inputprod_desc" ><?php echo $prod['prod_desc']?></textarea>
              </div>
              <div class="col-md-12 mt-3 mb-3">
              <label for="prod_image" class="form-label">Image</label>
              <input class="fadfa" type="file" id="prod_image" name="prod_image" value="<?php echo $prod['prod_image']?>">
              <!-- <div>
              <?php echo '<img src="includes/prodpic/'.$prod['prod_image'].'" width="100px;"'?>
              </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="update_btn" >Update</button>
                <a href="allproducts.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
            <?php    
                    }
                }
            ?>
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
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
