<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a = 7;

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
    ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content mt-5">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark mt-2">All Products</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-12 d-flex justify-content-end">
                        <a type="button" class="btn btn-primary btn-lg my-3" href="add-new-product.php">
                            Add New Product
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <?php
              $query = "SELECT * FROM products";
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
                                        <th>Edit</th>
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
                                            <?php echo '<button type="button" class="btn btn-success " data-toggle="modal" data-target="#update-' . $prod['id'] . '"><i class="fas fa-edit"></i></button>' ?>
                                        </td>
                                        <td>
                                            <?php echo '<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#deleteModal-' . $prod['id'] . '"><i class="fas fa-trash"></i></button>' ?>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal -->
                                    <div class="modal fade  " id="deleteModal-<?php echo $prod['id']; ?>" tabindex="-1"
                                        aria-labelledby="deleteModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to Delete this record?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php echo '<a  href=./includes/deleteproduct.php?id=' . $prod['id'] . ' class="btn btn-primary">Delete Record</a>' ?>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Modal -->
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="update-<?php echo $prod['id']; ?>" tabindex="-1"
                                        aria-labelledby="update" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Product</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="includes/updateproduct.php" method="post"
                                                        class="row g-3" autocomplete="off"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="edit_id"
                                                            value="<?php echo $prod['id'] ?>">
                                                        <div class="col-md-12">
                                                            <label for="edit_inputprod_name" class="form-label">Product
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_inputprod_name" name="edit_inputprod_name"
                                                                value="<?php echo $prod['prod_name'] ?>" required />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="edit_inputprod_price" class="form-label">Product
                                                                Price</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_inputprod_price" name="edit_inputprod_price"
                                                                value="<?php echo $prod['prod_price'] ?>" required />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="edit_inputprod_link"
                                                                class="form-label">Link</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_inputprod_link" name="edit_inputprod_link"
                                                                value="<?php echo $prod['link'] ?>" required />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="edit_inputprod_category"
                                                                class="form-label">Category</label>
                                                            <select id="edit_inputprod_category"
                                                                name="edit_inputprod_category" class="form-control">
                                                                <option value="Retail/Samples"
                                                                    <?php if ($prod['prod_category'] == 'Retail/Samples') echo 'selected' ?>>
                                                                    Retail/Samples</option>
                                                                <option value="Rebranding/Wholesale"
                                                                    <?php if ($prod['prod_category'] == 'Rebranding/Wholesale') echo 'selected' ?>>
                                                                    Rebranding/Wholesale</option>
                                                                <option value="Others"
                                                                    <?php if ($prod['prod_category'] == 'Others') echo 'selected' ?>>
                                                                    Others</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="edit_inputprod_desc"
                                                                class="form-label">Description</label>
                                                            <textarea class="form-control" id="edit_inputprod_desc"
                                                                rows="5"
                                                                name="edit_inputprod_desc"><?php echo $prod['prod_desc'] ?></textarea>
                                                        </div>
                                                        <div class="item_pic mt-3 mb-3">
                                                            <div><label class="form-label">Current Image</label></div>
                                                            <?php echo '<img src="includes/prodpic/' . $prod['prod_image'] . '" width="150px;"' ?>
                                                        </div>
                                                        <div class="col-md-12 mt-3 mb-3">
                                                            <label for="prod_image" class="form-label">New Image</label>
                                                            <input class="fadfa" type="file" id="prod_image"
                                                                name="prod_image"
                                                                value="<?php echo $prod['prod_image'] ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="d-md-flex align-items-center justify-content-end">
                                                            <button type="submit" class="btn btn-primary my-3 mx-1"
                                                                name="update_btn">Update</button>
                                                            <button type="button" class="btn btn-secondary my-3 mx-1"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Modal -->
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