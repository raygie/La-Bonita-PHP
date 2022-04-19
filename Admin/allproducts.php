<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a=7;

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
  <link rel="stylesheet" href="plugins/simple-datatables/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <?php include 'includes/topbar.php'; ?>
   
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'includes/sidebar.php';
    $result = $conn->query("SELECT * FROM products ORDER BY date_created desc");
    $prod = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Products</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12 d-flex justify-content-end">
                <a type="button" class="btn btn-primary btn-lg my-3" href="add_New_product.php">
                    Add New Product
                </a>
            </div>
        <div class="card">
            <div class="card-body table-responsive">
                <h5 class="card-title">Datatables</h5>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter =  mysqli_num_rows($result);
                            foreach ($prod as $prod): 
                        ?>
                            <tr>
                              <td><?=$counter?></td>
                                <td><?php echo '<img src="includes/prodpic/'.$prod['prod_image'].'" width="100px;"'?></td>
                                <td><?=$prod['prod_name'];?></td>
                                <td><?=$prod['prod_price'];?></td>
                                <td><?=$prod['prod_desc'];?></td>
                                <td><?=$prod['prod_category'];?></td>
                                <td><?=$prod['date_created'];?></td>
                                <td>
                                    <?php echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#updateproduct">Update</button>'?>
                                </td>
                                <td>
                                    <?php echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteModal-'.$prod['id'].'">Delete</button>'?>
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade  " id="deleteModal-<?php echo $prod['id'];?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Are you sure you want to permanently delete this record?</h4>
                                </div>
                                    <div class="modal-footer">
                                <?php echo '<a  href=./includes/deleteproduct.php?id=' . $prod['id'].' class="btn btn-primary">Delete Record</a>'?>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php $counter--; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="updateproduct" tabindex="-1" aria-labelledby="updateproduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Edit Product</h3>
          </div>
          <div class="modal-body">
            <form action="includes/addproduct.php" method="post" class="row g-3" autocomplete="off" >
            
              <div class="col-md-6">
                <label for="inputprod_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="inputprod_name" name="inputprod_name" value="" required/>
              </div>
              <div class="col-md-6">
                <label for="inputprod_price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="inputprod_price" name="inputprod_price" value="" required/>
              </div>
              <div class="col-md-6">
                <label for="inputprod_link" class="form-label">Link</label>
                <input type="text" class="form-control" id="inputprod_link" name="inputprod_link" value="" required/>
              </div>
              <div class="col-md-6">
                <label for="inputprod_category" class="form-label">Category</label>
                <input type="text" class="form-control" id="inputprod_category" name="inputprod_category" value=""/>
              </div>
              <div class="col-md-12">
                <label for="prod_desc" class="form-label">Description</label>
                <textarea class="form-control" id="prod_desc" rows="3" value=""></textarea>
              </div>
              <div class="col-md-12">
              <label for="inputprod_image" class="form-label">Image</label>
              <input class="form-control" type="file" id="inputprod_image"value="">
                  <img src="" width="120">
              </div>
            </form>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" >Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
      </div>
    </div>
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
<script src="plugins/simple-datatables/simple-datatables.js"></script>
</body>
</html>
