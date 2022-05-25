<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a = 13;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
        <?php include 'includes/sidebar.php';
    ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content mt-5">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark mt-2">Deleted Products</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <?php
              $query = "SELECT * FROM products_archive";
              $result = mysqli_query($conn, $query);

              if (mysqli_num_rows($result) > 0) {
              ?>
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Retrieve</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    while ($prod = mysqli_fetch_assoc($result)) {
                    ?>
                                    <tr>
                                        <td><?= $prod['id']; ?></td>
                                        <td><?php echo '<img src="includes/prodpic/' . $prod['prod_image'] . '" width="100px;"' ?>
                                        </td>
                                        <td><?= $prod['prod_name']; ?></td>
                                        <td><?= $prod['prod_price']; ?></td>
                                        <td><?= $prod['prod_category']; ?></td>
                                        <td><?= $prod['date_created']; ?></td>
                                        <td>
                                            <?php echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#retriModal-' . $prod['id'] . '"><i class="fas fa-check"></i></button>' ?>
                                        </td>
                                        <td>
                                            <?php echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteModal-' . $prod['id'] . '"><i class="fas fa-trash"></i></button>' ?>
                                        </td>
                                    </tr>
                                    <!-- Retrieve Modal -->
                                    <div class="modal fade  " id="retriModal-<?php echo $prod['id']; ?>" tabindex="-1"
                                        aria-labelledby="retriModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to Retrieve this record?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php echo '<a  href=./includes/retrieve-product.php?id=' . $prod['id'] . ' class="btn btn-primary">Retrieve Record</a>' ?>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Retrieve Modal -->
                                    <!-- Delete Modal -->
                                    <div class="modal fade  " id="deleteModal-<?php echo $prod['id']; ?>" tabindex="-1"
                                        aria-labelledby="deleteModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to permanently delete this record?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php echo '<a  href=./includes/totally-deleteproduct.php?id=' . $prod['id'] . ' class="btn btn-primary">Delete Record</a>' ?>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Modal -->

                                    <?php
                    }
                    ?>
                                </tbody>
                            </table>
                            <?php
              } else {
                echo "No Record Found";
              }
              ?>
                        </div>
                    </div><!-- /.container-fluid -->
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
    <script src="plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
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
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Records",
            }
        });
    });
    </script>
</body>

</html>