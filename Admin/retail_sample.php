<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a=8;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include 'includes/title.php'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
  <?php include 'includes/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-5">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark mt-2">Retail/Samples</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
            <div class="col-12 d-flex justify-content-end">
                <a type="button" class="btn btn-primary btn-lg my-3" href="add_New_product.php">
                    Add New Product
                </a>
            </div>
        <div class="card">
            <div class="card-body table-responsive">
            <?php
              $query = "SELECT * FROM products WHERE prod_category='Retail/Samples'";
              $result = mysqli_query($conn, $query);
              
              if(mysqli_num_rows($result) > 0)
              {
                  ?>
                  

                <table class="table datatable" id="datatable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          while($prod = mysqli_fetch_assoc($result))
                          {
                        ?>
                        
                            <tr>
                              <td><?php echo '<img src="includes/prodpic/'.$prod['prod_image'].'" width="100px;"'?></td>
                                <td><?=$prod['prod_name'];?></td>
                                <td><?=$prod['prod_price'];?></td>
                                <td><?=$prod['prod_desc'];?></td>
                                <td><?=$prod['date_created'];?></td>
                                <td>
                                <form action="Editproductpage.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $prod['id']?>">
                                    <button type="submit" name="edit_data" class="btn btn-success ">Update</button>
                                  </form>
                                </td>
                                <td>
                                    <?php echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteModal-'.$prod['id'].'">Delete</button>'?>
                                </td>
                            </tr>
                            <?php
                          }
                        ?>
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
                    </tbody>
                </table>
                <?php
              }
              else
              {
                echo "No Record Found";
              }
            ?>
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [5, 10, 20, -1],
        [5, 10, 20, "All"]
      ],
      responsive:true,
      language:{
        search: "_INPUT_",
        searchPlaceholder: "Search Records",
      }
    });
} );
</script>
</body>
</html>
